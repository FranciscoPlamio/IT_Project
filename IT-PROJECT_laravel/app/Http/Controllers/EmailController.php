<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class EmailController extends Controller
{
    /**
     * Show the email authentication form
     */
    public function showEmailAuth()
    {
        return view('emailAuthentication');
    }

    /**
     * Send authentication email
     */
    public function sendAuthEmail(Request $request)
    {
        // Validate the email input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please provide a valid email address.',
                'errors' => $validator->errors()
            ], 422);
        }

        $email = $request->input('email');
        
        // Generate a verification token
        $token = Str::random(32);
        
        // Store the token in cache for 15 minutes
        Cache::put('email_auth_' . $token, $email, 900); // 15 minutes
        
        try {
            // Send the authentication email
            Mail::send('emails.auth-email', [
                'email' => $email,
                'token' => $token,
                'verification_url' => route('email-auth.verify', ['token' => $token])
            ], function ($message) use ($email) {
                $message->to($email)
                        ->subject('Email Authentication - NTC Forms System');
            });

            return response()->json([
                'success' => true,
                'message' => 'Authentication email sent successfully. Please check your inbox.',
                'email' => $email
            ]);

        } catch (\Exception $e) {
            // Log the error
            Log::error('Email sending failed: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to send authentication email. Please try again later.'
            ], 500);
        }
    }

    /**
     * Verify email authentication token
     */
    public function verifyEmail(Request $request, $token)
    {
        $email = Cache::get('email_auth_' . $token);
        
        if (!$email) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid or expired verification token.'
                ], 400);
            }
            
            return redirect()->route('email-auth')->with('error', 'Invalid or expired verification token.');
        }

        // Remove the token from cache
        Cache::forget('email_auth_' . $token);
        
        // Store verified email in session
        session(['email_verified' => $email]);
        
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Email verified successfully!',
                'email' => $email,
                'redirect_url' => route('forms.list')
            ]);
        }
        
        // Redirect to forms list for direct browser requests
        return redirect()->route('forms.list')->with('success', 'Email verified successfully!');
    }

    /**
     * Check if email is verified
     */
    public function checkEmailStatus(Request $request)
    {
        $verifiedEmail = session('email_verified');
        
        if ($verifiedEmail) {
            return response()->json([
                'verified' => true,
                'email' => $verifiedEmail
            ]);
        }
        
        return response()->json([
            'verified' => false
        ]);
    }

    /**
     * Clear email verification session
     */
    public function clearEmailVerification(Request $request)
    {
        session()->forget('email_verified');
        
        return response()->json([
            'success' => true,
            'message' => 'Email verification cleared.'
        ]);
    }
}
