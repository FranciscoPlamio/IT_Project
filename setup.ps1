#Requires -Version 5.1
<#
.SYNOPSIS
    Automated setup script for IT-PROJECT Laravel application
.DESCRIPTION
    This script automatically downloads and installs all required dependencies:
    - PHP 8.2.13 (Thread Safe)
    - Composer
    - MongoDB Shell
    - cacert.pem
    - All Laravel dependencies
.NOTES
    Run this script after cloning the repository
#>

param(
    [switch]$SkipPHP,
    [switch]$SkipComposer,
    [switch]$SkipMongoDB
)

# Configuration
$ErrorActionPreference = "Stop"
$ProgressPreference = "SilentlyContinue" # Speeds up downloads

# Colors for output
function Write-Success { Write-Host $args[0] -ForegroundColor Green }
function Write-Info { Write-Host $args[0] -ForegroundColor Cyan }
function Write-Warn { Write-Host $args[0] -ForegroundColor Yellow }
function Write-Fail { Write-Host $args[0] -ForegroundColor Red }

# ASCII Banner
Write-Host @"
╔═══════════════════════════════════════════════════════════╗
║     IT-PROJECT Laravel - Automated Setup Script          ║
║                                                           ║
║  This will install all dependencies automatically        ║
╚═══════════════════════════════════════════════════════════╝
"@ -ForegroundColor Cyan

Write-Host ""

# Check if running in project directory
if (-not (Test-Path ".\IT-PROJECT_laravel\composer.json")) {
    Write-Fail "Error: Please run this script from the project root directory!"
    Write-Info "Expected to find: .\IT-PROJECT_laravel\composer.json"
    exit 1
}

$projectRoot = Get-Location
$toolsDir = Join-Path $projectRoot "dev-tools"
$phpDir = Join-Path $toolsDir "php"
$composerDir = Join-Path $toolsDir "composer"
$mongoDir = Join-Path $toolsDir "mongodb"

# Create tools directory
Write-Info "Creating dev-tools directory..."
New-Item -ItemType Directory -Force -Path $toolsDir | Out-Null
New-Item -ItemType Directory -Force -Path $phpDir | Out-Null
New-Item -ItemType Directory -Force -Path $composerDir | Out-Null
New-Item -ItemType Directory -Force -Path $mongoDir | Out-Null

# Function to download files with progress
function Download-File {
    param(
        [string]$Url,
        [string]$OutputPath,
        [string]$Description
    )
    
    Write-Info "Downloading $Description..."
    try {
        $webClient = New-Object System.Net.WebClient
        $webClient.DownloadFile($Url, $OutputPath)
        Write-Success "✓ Downloaded $Description"
        return $true
    }
    catch {
        Write-Fail "✗ Failed to download $Description"
        Write-Fail $_.Exception.Message
        return $false
    }
}

# ============================================================================
# PHP 8.2.13 Installation
# ============================================================================
if (-not $SkipPHP) {
    Write-Host ""
    Write-Info "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
    Write-Info "  Step 1: Installing PHP 8.2.13"
    Write-Info "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
    
    $phpExe = Join-Path $phpDir "php.exe"
    
    if (Test-Path $phpExe) {
        Write-Warn "PHP already installed, checking version..."
        $currentVersion = & $phpExe -v 2>$null | Select-String -Pattern "PHP (\d+\.\d+\.\d+)" | ForEach-Object { $_.Matches.Groups[1].Value }
        if ($currentVersion -eq "8.2.13") {
            Write-Success "✓ PHP 8.2.13 already installed"
        }
        else {
            Write-Warn "Different PHP version found: $currentVersion"
            Write-Info "Skipping PHP installation. Remove dev-tools/php to reinstall."
        }
    }
    else {
        # Download PHP 8.2.13 Thread Safe
        $phpZip = Join-Path $toolsDir "php-8.2.13.zip"
        $phpUrl = "https://windows.php.net/downloads/releases/php-8.2.13-Win32-vs16-x64.zip"
        
        if (Download-File -Url $phpUrl -OutputPath $phpZip -Description "PHP 8.2.13") {
            Write-Info "Extracting PHP..."
            Expand-Archive -Path $phpZip -DestinationPath $phpDir -Force
            Remove-Item $phpZip
            Write-Success "✓ PHP 8.2.13 installed"
            
            # Configure PHP
            Write-Info "Configuring PHP..."
            $phpIniDev = Join-Path $phpDir "php.ini-development"
            $phpIni = Join-Path $phpDir "php.ini"
            
            if (Test-Path $phpIniDev) {
                Copy-Item $phpIniDev $phpIni
                
                # Enable MongoDB extension
                $iniContent = Get-Content $phpIni
                $iniContent = $iniContent -replace ';extension=mongodb', 'extension=mongodb'
                $iniContent = $iniContent -replace ';extension=openssl', 'extension=openssl'
                $iniContent = $iniContent -replace ';extension=mbstring', 'extension=mbstring'
                $iniContent = $iniContent -replace ';extension=curl', 'extension=curl'
                $iniContent = $iniContent -replace ';extension=fileinfo', 'extension=fileinfo'
                $iniContent = $iniContent -replace ';extension=pdo_sqlite', 'extension=pdo_sqlite'
                $iniContent | Set-Content $phpIni
                
                Write-Success "✓ PHP configured with required extensions"
            }
        }
    }
    
    # Download cacert.pem
    Write-Info "Downloading cacert.pem for SSL/TLS..."
    $certDir = Join-Path $phpDir "extras\ssl"
    New-Item -ItemType Directory -Force -Path $certDir | Out-Null
    $cacertPath = Join-Path $certDir "cacert.pem"
    
    if (-not (Test-Path $cacertPath)) {
        $cacertUrl = "https://curl.se/ca/cacert.pem"
        if (Download-File -Url $cacertUrl -OutputPath $cacertPath -Description "cacert.pem") {
            # Update php.ini with cacert path
            $phpIni = Join-Path $phpDir "php.ini"
            if (Test-Path $phpIni) {
                $iniContent = Get-Content $phpIni
                $iniContent = $iniContent -replace ';curl.cainfo =', "curl.cainfo = `"$cacertPath`""
                $iniContent = $iniContent -replace ';openssl.cafile=', "openssl.cafile=`"$cacertPath`""
                $iniContent | Set-Content $phpIni
                Write-Success "✓ cacert.pem configured in PHP"
            }
        }
    }
    else {
        Write-Success "✓ cacert.pem already exists"
    }
}

# ============================================================================
# Composer Installation
# ============================================================================
if (-not $SkipComposer) {
    Write-Host ""
    Write-Info "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
    Write-Info "  Step 2: Installing Composer"
    Write-Info "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
    
    $composerPhar = Join-Path $composerDir "composer.phar"
    $composerBat = Join-Path $composerDir "composer.bat"
    
    if (Test-Path $composerPhar) {
        Write-Success "✓ Composer already installed"
    }
    else {
        $composerUrl = "https://getcomposer.org/download/latest-stable/composer.phar"
        if (Download-File -Url $composerUrl -OutputPath $composerPhar -Description "Composer") {
            # Create composer.bat wrapper
            $phpExe = Join-Path $phpDir "php.exe"
            $batContent = "@echo off`r`n`"$phpExe`" `"$composerPhar`" %*"
            $batContent | Set-Content $composerBat -Encoding ASCII
            Write-Success "✓ Composer installed"
        }
    }
}

# ============================================================================
# MongoDB Shell Installation
# ============================================================================
if (-not $SkipMongoDB) {
    Write-Host ""
    Write-Info "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
    Write-Info "  Step 3: Installing MongoDB Shell"
    Write-Info "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
    
    $mongoshExe = Join-Path $mongoDir "bin\mongosh.exe"
    
    if (Test-Path $mongoshExe) {
        Write-Success "✓ MongoDB Shell already installed"
    }
    else {
        Write-Info "Downloading MongoDB Shell..."
        $mongoZip = Join-Path $toolsDir "mongosh.zip"
        $mongoUrl = "https://downloads.mongodb.com/compass/mongosh-2.1.1-win32-x64.zip"
        
        if (Download-File -Url $mongoUrl -OutputPath $mongoZip -Description "MongoDB Shell") {
            Write-Info "Extracting MongoDB Shell..."
            Expand-Archive -Path $mongoZip -DestinationPath $toolsDir -Force
            
            # Move extracted folder to mongoDir
            $extractedFolder = Get-ChildItem $toolsDir -Directory | Where-Object { $_.Name -like "mongosh-*" } | Select-Object -First 1
            if ($extractedFolder) {
                Get-ChildItem $extractedFolder.FullName | Move-Item -Destination $mongoDir -Force
                Remove-Item $extractedFolder.FullName -Recurse
            }
            
            Remove-Item $mongoZip
            Write-Success "✓ MongoDB Shell installed"
        }
    }
}

# ============================================================================
# Install Laravel Dependencies
# ============================================================================
Write-Host ""
Write-Info "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
Write-Info "  Step 4: Installing Laravel Dependencies"
Write-Info "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"

$laravelDir = Join-Path $projectRoot "IT-PROJECT_laravel"
Set-Location $laravelDir

# Set up PATH for this session
$env:Path = "$phpDir;$composerDir;$mongoDir\bin;$env:Path"

# Check if vendor directory exists
if (Test-Path ".\vendor") {
    Write-Warn "Vendor directory already exists."
    $response = Read-Host "Reinstall dependencies? (y/N)"
    if ($response -eq 'y' -or $response -eq 'Y') {
        Write-Info "Running composer install..."
        & "$composerDir\composer.bat" install --no-interaction
    }
    else {
        Write-Info "Skipping composer install"
    }
}
else {
    Write-Info "Running composer install (this may take a few minutes)..."
    & "$composerDir\composer.bat" install --no-interaction
    Write-Success "✓ Laravel dependencies installed"
}

# Set up .env file
if (-not (Test-Path ".\.env")) {
    if (Test-Path ".\.env.example") {
        Write-Info "Creating .env file from .env.example..."
        Copy-Item ".\.env.example" ".\.env"
        
        Write-Info "Generating application key..."
        & "$phpDir\php.exe" artisan key:generate
        Write-Success "✓ Environment file configured"
    }
}
else {
    Write-Success "✓ .env file already exists"
}

# ============================================================================
# Final Instructions
# ============================================================================
Write-Host ""
Write-Success "╔═══════════════════════════════════════════════════════════╗"
Write-Success "║              Setup Completed Successfully!                ║"
Write-Success "╚═══════════════════════════════════════════════════════════╝"
Write-Host ""

Write-Info "Tools installed in: $toolsDir"
Write-Host ""

Write-Warn "⚠ IMPORTANT: Add tools to PATH for this terminal session:"
Write-Host ""
Write-Host '  $env:Path = "' -NoNewline
Write-Host "$phpDir;$composerDir;$mongoDir\bin" -ForegroundColor Yellow -NoNewline
Write-Host ';$env:Path"' -ForegroundColor White
Write-Host ""

Write-Info "Or use the helper script:"
Write-Host "  .\set-env.bat" -ForegroundColor Yellow
Write-Host ""

Write-Info "Next steps:"
Write-Host "  1. Install MongoDB Community Server from: https://www.mongodb.com/try/download/community" -ForegroundColor White
Write-Host "  2. Start MongoDB service" -ForegroundColor White
Write-Host "  3. Update .env file with your configuration" -ForegroundColor White
Write-Host "  4. Run: php artisan serve" -ForegroundColor White
Write-Host ""

Write-Success "For detailed setup instructions, see SETUP_GUIDE.md"
Write-Host ""

# Return to project root
Set-Location $projectRoot

# Create helper batch file for setting PATH
$envBat = @"
@echo off
echo Adding dev tools to PATH...
set PATH=%~dp0dev-tools\php;%~dp0dev-tools\composer;%~dp0dev-tools\mongodb\bin;%PATH%
echo.
echo ✓ Environment configured!
echo.
echo You can now use: php, composer, mongosh
echo.
cmd /k
"@
$envBat | Set-Content "set-env.bat" -Encoding ASCII

Write-Info "Created set-env.bat for easy PATH configuration"
