<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\AuthMail;
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
        if (session()->has('email_verified')) {
            return redirect()->route('display.forms');
        }
        return view('emailAuthentication');
    }

    public function test(Request $request)
    {
        try {
            $validated = Validator::make($request->all(), [
                'email' => 'required|email|max:255'
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Email is valid!',
                'data' => $validated,
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    //     try {
    //     $validated = $request->validate([
    //         'email' => 'required|email|max:255',
    //     ]);

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Email is valid!',
    //         'data' => $validated,
    //     ]);
    // } catch (\Illuminate\Validation\ValidationException $e) {
    //     return response()->json([
    //         'success' => false,
    //         'errors' => $e->errors(),
    //     ], 422);
    // } catch (\Exception $e) {
    //     return response()->json([
    //         'success' => false,
    //         'message' => $e->getMessage(),
    //     ], 500);
    // }

    /**
     * Send authentication email
     */
    public function sendAuthEmail(Request $request)
    {
        // Validate the email input with strict RFC validation
        // Using 'rfc,strict' for stricter email validation that rejects invalid formats
        // Also adding regex to ensure domain has a TLD (e.g., .com, .org)
        $validator = Validator::make($request->all(), [
            'email' => [
                'required',
                'email:rfc,strict',
                'max:255',
                'regex:/^[^\s@]+@[^\s@]+\.[^\s@]+$/' // Ensures domain has a TLD
            ]
        ]);

        if ($validator->fails()) {
            // Log validation failures for monitoring and security
            Log::warning('Email authentication validation failed', [
                'email' => $request->input('email'),
                'errors' => $validator->errors()->toArray(),
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

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
            // Send the authentication email using the AuthMail mailable class
            $verificationUrl = route('email-auth.verify', ['token' => $token]);

            Mail::to($email)->send(new AuthMail(
                $email,
                $token,
                $verificationUrl
            ));

            // Log successful email send for audit trail
            Log::info('Authentication email sent successfully', [
                'email' => $email,
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Authentication email sent successfully. Please check your inbox.',
                'email' => $email
            ]);
        } catch (\Exception $e) {
            // Log detailed error information
            Log::error('Email sending failed', [
                'email' => $email,
                'error_message' => $e->getMessage(),
                'error_file' => $e->getFile(),
                'error_line' => $e->getLine(),
                'error_trace' => $e->getTraceAsString(),
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

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

        // Store verified email in database
        try {
            if (!User::where('email', $email)->exists()) {
                $user = User::create([
                    'email' => $email,
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unexpected error: ' . $e->getMessage(),
            ], 500);
        }

        // Retrieve intended URL from session
        $redirectUrl = session('intended_url', route('display.forms'));
        session()->forget('intended_url'); // Clean up after use


        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Email verified successfully!',
                'email' => $email,
                'redirect_url' => $redirectUrl
            ]);
        }

        // Redirect to forms list for direct browser requests
        return redirect($redirectUrl)->with('success', 'Email verified successfully!');
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
        session()->flush(); // 🧹 clears ALL session data

        // Redirect to home page after signing out
        return redirect()->route('homepage')->with('message', 'You have been signed out successfully.');
    }
}
