<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

## Project Setup for Network Access

### Prerequisites
- WAMP Server installed and running
- Node.js and npm installed
- Both devices (laptop and phone) connected to the same network

### Steps to Host Laravel Project for Network Access

#### 1. Configure APP_URL
Set your Laravel application URL in the `.env` file:
```env
APP_URL=http://[YOUR_LAPTOP_IP]/it-project/IT-PROJECT_laravel/public/
```
Replace `[YOUR_LAPTOP_IP]` with your laptop's local network IP address.

#### 2. Configure Vite for Network Access
Update `vite.config.js` to allow external connections:
```javascript
server: {
    host: '0.0.0.0', // Allow external connections
    port: 5173,
    hmr: {
        host: '[YOUR_LAPTOP_IP]', // Replace with your laptop's IP address
    },
},
```

#### 3. Configure WAMP Apache Settings
- Right-click WAMP icon → Apache → vhost-httpd.conf
- Make sure vhost-httpd.conf is default
- Ensure your virtual host includes:
  ```apache
  Options +Indexes +Includes +FollowSymLinks +MultiViews
  AllowOverride All
  Require all granted
  ```
- Restart Apache

#### 4. Configure Windows Firewall for Apache
Follow these steps to allow Apache (httpd.exe) through the firewall:

1. Open Control Panel → Windows Defender Firewall
2. Click "Allow an app through firewall"
3. Click "Change settings" → "Allow another app..."
4. Browse to: `C:\wamp64\bin\apache\apache2.4.xx\bin\httpd.exe`
5. Check both "Private" and "Public" boxes
6. Click "OK"

#### 5. Configure Windows Firewall Communication
1. Open Windows Defender Firewall with Advanced Security
2. Enable rules for both IPv4 and IPv6 "File Sharing and Printing" in both outbound and  inbound rules.

#### 6. Start Development Servers
```bash
# Terminal 1: Start Vite dev server
npx vite --host

#### 6. Access from Mobile Device
- Use your laptop's IP: `http://[YOUR_LAPTOP_IP]/it-project/IT-PROJECT_laravel/public/`
- Vite assets will be served from: `http://[YOUR_LAPTOP_IP]:5173`
