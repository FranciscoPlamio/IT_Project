# IT-PROJECT Laravel - Setup Guide

Welcome! This guide will help you set up the IT-PROJECT Laravel application on your Windows machine.

## Quick Start (Recommended)

### Option 1: PowerShell Script (Recommended)

1. **Clone the repository**:

   ```powershell
   git clone <repository-url> it-project
   cd it-project
   ```

2. **Run the setup script**:

   ```powershell
   .\setup.ps1
   ```

3. **Add tools to PATH** (for current terminal):

   ```powershell
   .\set-env.bat
   ```

4. **Install MongoDB** (if not already installed):

   - Download from: https://www.mongodb.com/try/download/community
   - Install with default settings
   - MongoDB will run as a Windows service automatically

5. **Start the development server**:

   ```powershell
   cd IT-PROJECT_laravel
   php artisan serve
   ```

6. **Open your browser** and visit: `http://localhost:8000`

### Option 2: Batch Script (Legacy)

If you encounter issues with PowerShell, use the batch script instead:

```cmd
setup.bat
```

Then follow steps 3-6 above.

---

## What Gets Installed

The setup scripts automatically download and install:

| Component        | Version              | Size    | Purpose                  |
| ---------------- | -------------------- | ------- | ------------------------ |
| PHP              | 8.2.13 (Thread Safe) | ~30 MB  | Laravel runtime          |
| cacert.pem       | Latest               | ~200 KB | SSL/TLS certificates     |
| Composer         | Latest               | ~2 MB   | PHP dependency manager   |
| MongoDB Shell    | 2.1.1                | ~40 MB  | Database CLI tool        |
| Laravel packages | Various              | ~100 MB | Application dependencies |

**Total download size**: ~170 MB

All tools are installed in the `dev-tools` directory within your project folder (portable installation).

---

## Prerequisites

✅ **Required**:

- Windows 10 or later
- Internet connection for downloads
- ~500 MB free disk space

✅ **MongoDB Server** (must be installed separately):

- Download: https://www.mongodb.com/try/download/community
- Version: 6.0 or later recommended
- The setup script only installs MongoDB Shell (CLI), not the server

⚠️ **Optional but recommended**:

- Git for cloning the repository
- Visual Studio Code or your preferred editor

---

## Manual Installation

If you prefer to install dependencies manually or the automated scripts fail:

### 1. Install PHP 8.2.13

1. Download PHP 8.2.13 Thread Safe from:

   ```
   https://windows.php.net/downloads/releases/php-8.2.13-Win32-vs16-x64.zip
   ```

2. Extract to `dev-tools\php`

3. Copy `php.ini-development` to `php.ini`

4. Edit `php.ini` and uncomment these extensions:

   ```ini
   extension=curl
   extension=fileinfo
   extension=mbstring
   extension=mongodb
   extension=openssl
   extension=pdo_sqlite
   ```

5. Download cacert.pem:

   ```
   https://curl.se/ca/cacert.pem
   ```

   Save to: `dev-tools\php\extras\ssl\cacert.pem`

6. Add to `php.ini`:
   ```ini
   curl.cainfo = "C:\path\to\dev-tools\php\extras\ssl\cacert.pem"
   openssl.cafile = "C:\path\to\dev-tools\php\extras\ssl\cacert.pem"
   ```

### 2. Install Composer

1. Download composer.phar:

   ```
   https://getcomposer.org/download/latest-stable/composer.phar
   ```

2. Save to `dev-tools\composer\composer.phar`

3. Create `composer.bat` in `dev-tools\composer\`:
   ```batch
   @echo off
   "C:\path\to\dev-tools\php\php.exe" "C:\path\to\dev-tools\composer\composer.phar" %*
   ```

### 3. Install MongoDB Shell

1. Download MongoDB Shell:

   ```
   https://downloads.mongodb.com/compass/mongosh-2.1.1-win32-x64.zip
   ```

2. Extract to `dev-tools\mongodb`

### 4. Install MongoDB Server

1. Download MongoDB Community Server:

   ```
   https://www.mongodb.com/try/download/community
   ```

2. Run the installer with default settings

3. Ensure MongoDB service is running:
   ```powershell
   Get-Service MongoDB
   ```

### 5. Install Laravel Dependencies

1. Add tools to PATH:

   ```powershell
   $env:Path = "C:\path\to\dev-tools\php;C:\path\to\dev-tools\composer;C:\path\to\dev-tools\mongodb\bin;$env:Path"
   ```

2. Navigate to Laravel directory:

   ```powershell
   cd IT-PROJECT_laravel
   ```

3. Install dependencies:

   ```powershell
   composer install
   ```

4. Setup environment:
   ```powershell
   copy .env.example .env
   php artisan key:generate
   ```

---

## Configuration

### Environment File (.env)

After running the setup script, you need to configure your `.env` file:

```env
APP_NAME="NTC Forms System"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

# MongoDB Configuration
DB_CONNECTION=mongodb
MONGODB_URI="mongodb://localhost:27017"
MONGODB_DATABASE="it_project_laravel"

# Mail Configuration (if using email features)
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="${APP_NAME}"

# ReCAPTCHA (if using reCAPTCHA)
RECAPTCHA_SITE_KEY=your-site-key
RECAPTCHA_SECRET_KEY=your-secret-key
```

### Adding Tools to PATH Permanently

To use `php`, `composer`, and `mongosh` from any terminal:

**Option 1: Using System Settings (Permanent)**

1. Press `Win + X` and select "System"
2. Click "Advanced system settings"
3. Click "Environment Variables"
4. Under "User variables", select "Path" and click "Edit"
5. Add these paths:
   ```
   C:\path\to\your\project\dev-tools\php
   C:\path\to\your\project\dev-tools\composer
   C:\path\to\your\project\dev-tools\mongodb\bin
   ```

**Option 2: Using set-env.bat (Temporary)**

Just run `set-env.bat` in your project root whenever you open a new terminal.

---

## Troubleshooting

### "php is not recognized as an internal or external command"

**Solution**: Run `set-env.bat` to add PHP to PATH for the current terminal session.

### MongoDB connection failed

**Cause**: MongoDB server is not running.

**Solution**:

1. Check if MongoDB service is running:

   ```powershell
   Get-Service MongoDB
   ```

2. Start the service if stopped:

   ```powershell
   Start-Service MongoDB
   ```

3. Or install MongoDB Community Server if not installed:
   https://www.mongodb.com/try/download/community

### Composer install fails with SSL errors

**Cause**: cacert.pem is not configured properly.

**Solution**:

1. Ensure `cacert.pem` exists in `dev-tools\php\extras\ssl\cacert.pem`
2. Check `php.ini` has the correct paths:
   ```ini
   curl.cainfo = "C:\your\path\dev-tools\php\extras\ssl\cacert.pem"
   openssl.cafile = "C:\your\path\dev-tools\php\extras\ssl\cacert.pem"
   ```

### "execution of scripts is disabled on this system" (PowerShell)

**Cause**: PowerShell execution policy is restricted.

**Solution**:

```powershell
Set-ExecutionPolicy -Scope CurrentUser -ExecutionPolicy RemoteSigned
```

Or use the batch script instead: `setup.bat`

### MongoDB extension not loading

**Cause**: The MongoDB PHP extension is not enabled or missing.

**Solution**:

1. Check if `php_mongodb.dll` exists in `dev-tools\php\ext\`
2. If present, ensure `extension=mongodb` is uncommented in `php.ini`
3. If missing, download the MongoDB extension:
   - Visit: https://pecl.php.net/package/mongodb
   - Download version compatible with PHP 8.2 Thread Safe
   - Extract `php_mongodb.dll` to `dev-tools\php\ext\`

### Storage/logs permissions error

**Cause**: Laravel needs write permissions to storage and bootstrap/cache directories.

**Solution**:

```powershell
cd IT-PROJECT_laravel
# These directories should already have correct permissions on Windows
# If issues persist, check antivirus/security software
```

---

## Running the Application

### Development Server

```powershell
cd IT-PROJECT_laravel
php artisan serve
```

Visit: `http://localhost:8000`

### Alternative: Using WAMP/XAMPP

If you already have WAMP or XAMPP:

1. Ensure PHP version is 8.2 or higher
2. Enable required extensions in `php.ini`
3. Point your virtual host to `IT-PROJECT_laravel\public\`

---

## Next Steps

After successful setup:

1. ✅ **Verify installations**:

   ```powershell
   php --version        # Should show 8.2.13
   composer --version   # Should show Composer version
   mongosh --version    # Should show MongoDB Shell version
   ```

2. ✅ **Check MongoDB connection**:

   ```powershell
   mongosh mongodb://localhost:27017
   ```

3. ✅ **Run migrations** (if any):

   ```powershell
   cd IT-PROJECT_laravel
   php artisan migrate
   ```

4. ✅ **Test the application**:
   ```powershell
   php artisan serve
   ```
   Open: http://localhost:8000

---

## Updating Dependencies

### Update PHP Packages

```powershell
cd IT-PROJECT_laravel
composer update
```

### Update NPM Packages (if using Vite)

```powershell
cd IT-PROJECT_laravel
npm install
npm run dev
```

---

## Additional Resources

- **Laravel Documentation**: https://laravel.com/docs
- **MongoDB PHP Library**: https://www.mongodb.com/docs/php-library/current/
- **Composer Documentation**: https://getcomposer.org/doc/
- **PHP Documentation**: https://www.php.net/manual/en/

---

## Getting Help

If you encounter issues not covered in this guide:

1. Check the error message carefully
2. Review the Troubleshooting section above
3. Check Laravel logs: `IT-PROJECT_laravel\storage\logs\laravel.log`
4. Contact the development team

---

## Uninstallation

To remove the installed tools:

1. Delete the `dev-tools` directory
2. Delete `set-env.bat`
3. Remove paths from system environment variables (if added permanently)
4. Uninstall MongoDB Server from Windows "Add or Remove Programs"

The project files in `IT-PROJECT_laravel` are independent and can be kept.

---

**Happy coding! 🚀**
