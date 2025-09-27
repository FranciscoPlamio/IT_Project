<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmailVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session('email_verified')) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Email verification required.',
                    'redirect' => route('email-auth')
                ], 403);
            }
            
            return redirect()->route('email-auth')->with('error', 'Please verify your email address to access this page.');
        }

        return $next($request);
    }
}
