<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BlockMobileDevices
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $agent = $request->header('User-Agent');

        // Detect common mobile/tablet keywords
        $blockedDevices = [
            'Mobile', 'Android', 'iPhone', 'iPad', 'iPod',
            'BlackBerry', 'Windows Phone', 'Opera Mini', 'IEMobile', 'Tablet'
        ];

        foreach ($blockedDevices as $device) {
            if (stripos($agent, $device) !== false) {
                // Return Laravel's default 404
                abort(404);
            }
        }

        return $next($request);
    }
}
