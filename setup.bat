@echo off
setlocal enabledelayedexpansion

:: ============================================================================
:: IT-PROJECT Laravel - Simple Setup Script
:: ============================================================================
:: This batch script provides a simpler alternative to setup.ps1
:: It downloads and installs all required dependencies automatically
:: ============================================================================

color 0B
title IT-PROJECT Setup

echo.
echo ===============================================================
echo      IT-PROJECT Laravel - Automated Setup Script
echo.
echo   This will install all dependencies automatically
echo ===============================================================
echo.

:: Check if running in correct directory
if not exist "IT-PROJECT_laravel\composer.json" (
    color 0C
    echo [ERROR] Please run this script from the project root directory!
    echo Expected to find: IT-PROJECT_laravel\composer.json
    pause
    exit /b 1
)

set "PROJECT_ROOT=%cd%"
set "TOOLS_DIR=%PROJECT_ROOT%\dev-tools"
set "PHP_DIR=%TOOLS_DIR%\php"
set "COMPOSER_DIR=%TOOLS_DIR%\composer"
set "MONGO_DIR=%TOOLS_DIR%\mongodb"

:: Create directories
echo [INFO] Creating dev-tools directory...
if not exist "%TOOLS_DIR%" mkdir "%TOOLS_DIR%"
if not exist "%PHP_DIR%" mkdir "%PHP_DIR%"
if not exist "%COMPOSER_DIR%" mkdir "%COMPOSER_DIR%"
if not exist "%MONGO_DIR%" mkdir "%MONGO_DIR%"

:: Check for PowerShell
where powershell >nul 2>&1
if %errorlevel% equ 0 (
    echo.
    echo [INFO] PowerShell detected. For better experience, use: setup.ps1
    echo [INFO] Continuing with basic batch installation...
    echo.
    timeout /t 3 >nul
)

:: ============================================================================
:: Download PHP 8.2.13
:: ============================================================================
echo.
echo ================================================================
echo   Step 1: Installing PHP 8.2.13
echo ================================================================
echo.

if exist "%PHP_DIR%\php.exe" (
    echo [OK] PHP already installed
) else (
    echo [INFO] Downloading PHP 8.2.13...
    powershell -Command "& {[Net.ServicePointManager]::SecurityProtocol = [Net.SecurityProtocolType]::Tls12; Invoke-WebRequest -Uri 'https://windows.php.net/downloads/releases/php-8.2.13-Win32-vs16-x64.zip' -OutFile '%TOOLS_DIR%\php.zip'}"
    
    if exist "%TOOLS_DIR%\php.zip" (
        echo [INFO] Extracting PHP...
        powershell -Command "Expand-Archive -Path '%TOOLS_DIR%\php.zip' -DestinationPath '%PHP_DIR%' -Force"
        del "%TOOLS_DIR%\php.zip"
        
        :: Configure PHP
        echo [INFO] Configuring PHP...
        if exist "%PHP_DIR%\php.ini-development" (
            copy /Y "%PHP_DIR%\php.ini-development" "%PHP_DIR%\php.ini" >nul
            
            :: Enable extensions using PowerShell (more reliable than batch text manipulation)
            powershell -Command "& {$ini = Get-Content '%PHP_DIR%\php.ini'; $ini = $ini -replace ';extension=mongodb', 'extension=mongodb'; $ini = $ini -replace ';extension=openssl', 'extension=openssl'; $ini = $ini -replace ';extension=mbstring', 'extension=mbstring'; $ini = $ini -replace ';extension=curl', 'extension=curl'; $ini = $ini -replace ';extension=fileinfo', 'extension=fileinfo'; $ini = $ini -replace ';extension=pdo_sqlite', 'extension=pdo_sqlite'; $ini | Set-Content '%PHP_DIR%\php.ini'}"
            
            echo [OK] PHP configured
        )
        
        echo [OK] PHP 8.2.13 installed
    ) else (
        echo [ERROR] Failed to download PHP
    )
)

:: Download cacert.pem
echo.
echo [INFO] Downloading cacert.pem for SSL/TLS...
if not exist "%PHP_DIR%\extras\ssl" mkdir "%PHP_DIR%\extras\ssl"

if not exist "%PHP_DIR%\extras\ssl\cacert.pem" (
    powershell -Command "& {[Net.ServicePointManager]::SecurityProtocol = [Net.SecurityProtocolType]::Tls12; Invoke-WebRequest -Uri 'https://curl.se/ca/cacert.pem' -OutFile '%PHP_DIR%\extras\ssl\cacert.pem'}"
    
    if exist "%PHP_DIR%\extras\ssl\cacert.pem" (
        :: Update php.ini
        powershell -Command "& {$ini = Get-Content '%PHP_DIR%\php.ini'; $certPath = '%PHP_DIR%\extras\ssl\cacert.pem' -replace '\\', '\\'; $ini = $ini -replace ';curl.cainfo =', \"curl.cainfo = `\"$certPath`\"\"; $ini = $ini -replace ';openssl.cafile=', \"openssl.cafile=`\"$certPath`\"\"; $ini | Set-Content '%PHP_DIR%\php.ini'}"
        echo [OK] cacert.pem configured
    )
) else (
    echo [OK] cacert.pem already exists
)

:: ============================================================================
:: Download Composer
:: ============================================================================
echo.
echo ================================================================
echo   Step 2: Installing Composer
echo ================================================================
echo.

if exist "%COMPOSER_DIR%\composer.phar" (
    echo [OK] Composer already installed
) else (
    echo [INFO] Downloading Composer...
    powershell -Command "& {[Net.ServicePointManager]::SecurityProtocol = [Net.SecurityProtocolType]::Tls12; Invoke-WebRequest -Uri 'https://getcomposer.org/download/latest-stable/composer.phar' -OutFile '%COMPOSER_DIR%\composer.phar'}"
    
    if exist "%COMPOSER_DIR%\composer.phar" (
        :: Create composer.bat wrapper
        (
            echo @echo off
            echo "%PHP_DIR%\php.exe" "%COMPOSER_DIR%\composer.phar" %%*
        ) > "%COMPOSER_DIR%\composer.bat"
        
        echo [OK] Composer installed
    ) else (
        echo [ERROR] Failed to download Composer
    )
)

:: ============================================================================
:: Download MongoDB Shell
:: ============================================================================
echo.
echo ================================================================
echo   Step 3: Installing MongoDB Shell
echo ================================================================
echo.

if exist "%MONGO_DIR%\bin\mongosh.exe" (
    echo [OK] MongoDB Shell already installed
) else (
    echo [INFO] Downloading MongoDB Shell...
    powershell -Command "& {[Net.ServicePointManager]::SecurityProtocol = [Net.SecurityProtocolType]::Tls12; Invoke-WebRequest -Uri 'https://downloads.mongodb.com/compass/mongosh-2.1.1-win32-x64.zip' -OutFile '%TOOLS_DIR%\mongosh.zip'}"
    
    if exist "%TOOLS_DIR%\mongosh.zip" (
        echo [INFO] Extracting MongoDB Shell...
        powershell -Command "Expand-Archive -Path '%TOOLS_DIR%\mongosh.zip' -DestinationPath '%TOOLS_DIR%' -Force"
        
        :: Move extracted files
        for /d %%i in ("%TOOLS_DIR%\mongosh-*") do (
            xcopy /E /I /Y "%%i\*" "%MONGO_DIR%" >nul
            rmdir /S /Q "%%i"
        )
        
        del "%TOOLS_DIR%\mongosh.zip"
        echo [OK] MongoDB Shell installed
    ) else (
        echo [ERROR] Failed to download MongoDB Shell
    )
)

:: ============================================================================
:: Install Laravel Dependencies
:: ============================================================================
echo.
echo ================================================================
echo   Step 4: Installing Laravel Dependencies
echo ================================================================
echo.

:: Add tools to PATH for this session
set "PATH=%PHP_DIR%;%COMPOSER_DIR%;%MONGO_DIR%\bin;%PATH%"

cd /d "%PROJECT_ROOT%\IT-PROJECT_laravel"

if exist "vendor" (
    echo [WARN] Vendor directory already exists.
    echo [INFO] Skipping composer install. Delete vendor folder to reinstall.
) else (
    echo [INFO] Running composer install (this may take a few minutes)...
    call "%COMPOSER_DIR%\composer.bat" install --no-interaction
    if %errorlevel% equ 0 (
        echo [OK] Laravel dependencies installed
    ) else (
        echo [ERROR] Composer install failed
    )
)

:: Setup .env file
if not exist ".env" (
    if exist ".env.example" (
        echo [INFO] Creating .env file...
        copy ".env.example" ".env" >nul
        
        echo [INFO] Generating application key...
        "%PHP_DIR%\php.exe" artisan key:generate
        echo [OK] Environment configured
    )
) else (
    echo [OK] .env file already exists
)

cd /d "%PROJECT_ROOT%"

:: ============================================================================
:: Final Instructions
:: ============================================================================
echo.
color 0A
echo ===============================================================
echo            Setup Completed Successfully!
echo ===============================================================
echo.
color 0B
echo Tools installed in: %TOOLS_DIR%
echo.
echo [!] IMPORTANT: To use PHP, Composer, and MongoDB Shell,
echo     run this command to add them to PATH:
echo.
color 0E
echo     set-env.bat
echo.
color 0B
echo Next steps:
echo   1. Install MongoDB Community Server from:
echo      https://www.mongodb.com/try/download/community
echo   2. Start MongoDB service
echo   3. Update .env file with your configuration
echo   4. Run: php artisan serve
echo.
echo For detailed setup instructions, see SETUP_GUIDE.md
echo.

:: Create helper batch file
(
    echo @echo off
    echo echo Adding dev tools to PATH...
    echo set PATH=%%~dp0dev-tools\php;%%~dp0dev-tools\composer;%%~dp0dev-tools\mongodb\bin;%%PATH%%
    echo echo.
    echo echo [OK] Environment configured!
    echo echo.
    echo echo You can now use: php, composer, mongosh
    echo echo.
    echo cmd /k
) > "%PROJECT_ROOT%\set-env.bat"

echo [INFO] Created set-env.bat for easy PATH configuration
echo.
pause