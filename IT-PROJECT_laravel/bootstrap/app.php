<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: [
            __DIR__ . '/../routes/web.php',
            __DIR__ . '/../routes/admin.php',
            __DIR__ . '/../routes/transactions.php',
            __DIR__ . '/../routes/form.php',
        ],
        api: [
            __DIR__ . '/../routes/api.php',   //  ✅ ADD THIS
        ],
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'email.verified' => \App\Http\Middleware\EmailVerified::class,
            'block.mobile'   => \App\Http\Middleware\BlockMobileDevices::class, // 👈 add this
            'admin.auth'     => \App\Http\Middleware\AdminAuth::class, // 👈 add this
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })
    ->create();
