<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * Global middleware (keep empty if you want nothing).
     */
    protected $middleware = [
        //
    ];

    /**
     * Middleware groups (empty — but required by Laravel).
     */
    protected $middlewareGroups = [
        'web' => [],
        'api' => [],
    ];

    /**
     * Route middleware (ONLY the auth middleware).
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'admin.auth' => \App\Http\Middleware\AdminAuth::class,
    ];
}
