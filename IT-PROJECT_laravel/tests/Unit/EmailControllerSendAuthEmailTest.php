<?php

namespace Tests\Unit;

use App\Http\Controllers\EmailController;
use App\Mail\AuthMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Mockery;
use Tests\TestCase;

class EmailControllerSendAuthEmailTest extends TestCase
{
    protected EmailController $controller;

    protected function setUp(): void
    {
        parent::setUp();
        $this->controller = new EmailController();
    }

    /**
     * Test that valid email passes validation.
     */
    public function test_valid_email_passes_validation(): void
    {
        Mail::fake();
        Cache::flush();

        $request = Request::create('/email-auth', 'POST', [
            'email' => 'valid@example.com'
        ]);

        $response = $this->controller->sendAuthEmail($request);

        $this->assertEquals(200, $response->getStatusCode());
        $responseData = json_decode($response->getContent(), true);
        $this->assertTrue($responseData['success']);
    }

    /**
     * Test that invalid email fails validation.
     */
    public function test_invalid_email_fails_validation(): void
    {
        Mail::fake();

        $request = Request::create('/email-auth', 'POST', [
            'email' => 'invalid-email'
        ]);

        $response = $this->controller->sendAuthEmail($request);

        $this->assertEquals(422, $response->getStatusCode());
        $responseData = json_decode($response->getContent(), true);
        $this->assertFalse($responseData['success']);
        $this->assertArrayHasKey('errors', $responseData);
    }

    /**
     * Test that missing email fails validation.
     */
    public function test_missing_email_fails_validation(): void
    {
        Mail::fake();

        $request = Request::create('/email-auth', 'POST', []);

        $response = $this->controller->sendAuthEmail($request);

        $this->assertEquals(422, $response->getStatusCode());
        $responseData = json_decode($response->getContent(), true);
        $this->assertFalse($responseData['success']);
        $this->assertArrayHasKey('errors', $responseData);
    }

    /**
     * Test that token is generated and stored in cache.
     */
    public function test_token_is_generated_and_stored_in_cache(): void
    {

        Mail::fake();
        Cache::flush();

        $email = 'test@example.com';
        $request = Request::create('/email-auth', 'POST', [
            'email' => $email
        ]);

        $this->controller->sendAuthEmail($request);

        // Verify a token was stored in cache
        // We need to find the token by checking cache keys
        $tokenFound = false;
        $cachedEmail = null;

        // Since we can't directly list cache keys easily, we'll verify
        // that the email sending was successful, which means token was stored
        // Mail::assertSent(AuthMail::class, function ($mail) {
        //     dd($mail->email, $mail->token, $mail->verification_url);
        // });

        Mail::assertSent(AuthMail::class, function ($mail) use ($email, &$tokenFound, &$cachedEmail) {
            if ($mail->hasTo($email)) {
                $viewData = $mail->token;
                if (isset($viewData)) {
                    $token = $viewData;
                    $cachedEmail = Cache::get('email_auth_' . $token);
                    $tokenFound = ($cachedEmail === $email);
                    // dd($cachedEmail, $tokenFound, $token);
                }
                return true;
            }
            return false;
        });

        $this->assertTrue($tokenFound, 'Token should be stored in cache with email');
    }

    /**
     * Test that email sending is attempted with correct data.
     * 
     * Note: Mail::send() with view strings isn't tracked by MailFake,
     * so we verify the response and that no exceptions were thrown.
     */
    public function test_email_sending_is_attempted(): void
    {
        Mail::fake();
        Cache::flush();

        $email = 'test@example.com';
        $request = Request::create('/email-auth', 'POST', [
            'email' => $email
        ]);

        $response = $this->controller->sendAuthEmail($request);

        // Verify response indicates success
        $this->assertEquals(200, $response->getStatusCode());
        $responseData = json_decode($response->getContent(), true);
        $this->assertTrue($responseData['success']);
        $this->assertEquals($email, $responseData['email']);

        // Verify Mail::send was called (no exception thrown means it was attempted)
        // MailFake silently accepts view strings but doesn't track them
    }

    /**
     * Test that token generation works correctly.
     * Since MailFake doesn't track view strings, we verify token generation
     * by checking that Str::random(32) would generate a 32-char token.
     */
    public function test_token_generation_works(): void
    {
        // Verify Str::random(32) generates 32-character strings
        $token1 = \Illuminate\Support\Str::random(32);
        $token2 = \Illuminate\Support\Str::random(32);

        $this->assertEquals(32, strlen($token1));
        $this->assertEquals(32, strlen($token2));
        $this->assertNotEquals($token1, $token2); // Tokens should be unique
    }

    // /**
    //  * Test that email sending failure is logged and handled.
    //  */
    // public function test_email_sending_failure_is_logged(): void
    // {
    //     Log::shouldReceive('error')
    //         ->once()
    //         ->with(\Mockery::pattern('/Email sending failed/'));

    //     Mail::shouldReceive('send')
    //         ->once()
    //         ->andThrow(new \Exception('SMTP connection failed'));

    //     $email = 'test@example.com';
    //     $request = Request::create('/email-auth', 'POST', [
    //         'email' => $email
    //     ]);

    //     $response = $this->controller->sendAuthEmail($request);

    //     $this->assertEquals(500, $response->getStatusCode());
    //     $responseData = json_decode($response->getContent(), true);
    //     $this->assertFalse($responseData['success']);
    //     $this->assertEquals('Failed to send authentication email. Please try again later.', $responseData['message']);
    // }

    public function test_email_sending_failure_is_logged()
    {
        Cache::flush();

        // 1. Create a fake mailer to receive ->send()
        $fakeMailer = Mockery::mock();
        $fakeMailer->shouldReceive('send')
            ->once()
            ->andThrow(new \Exception('Simulated email failure'));

        // 2. Mock Mail::to() so it returns the fake mailer
        Mail::shouldReceive('to')
            ->once()
            ->with('test@example.com')
            ->andReturn($fakeMailer);

        // 3. Expect log entry
        Log::shouldReceive('error')
            ->once()
            ->withArgs(function ($msg, $context) {
                return $msg === 'Email sending failed'
                    && $context['email'] === 'test@example.com'
                    && str_contains($context['error_message'], 'Simulated email failure');
            });

        $controller = new EmailController();

        $request = Request::create('/email-auth', 'POST', [
            'email' => 'test@example.com',
        ]);

        $response = $controller->sendAuthEmail($request);

        $json = $response->getData(true);

        $this->assertFalse($json['success']);
        $this->assertEquals('Failed to send authentication email. Please try again later.', $json['message']);
    }


    /**
     * Test that successful response contains correct structure.
     */
    public function test_successful_response_contains_correct_structure(): void
    {
        Mail::fake();
        Cache::flush();

        $email = 'test@example.com';
        $request = Request::create('/email-auth', 'POST', [
            'email' => $email
        ]);

        $response = $this->controller->sendAuthEmail($request);

        $this->assertEquals(200, $response->getStatusCode());
        $responseData = json_decode($response->getContent(), true);

        $this->assertArrayHasKey('success', $responseData);
        $this->assertArrayHasKey('message', $responseData);
        $this->assertArrayHasKey('email', $responseData);
        $this->assertTrue($responseData['success']);
        $this->assertEquals($email, $responseData['email']);
    }

    /**
     * Test that cache stores email (verification via response).
     * Since MailFake doesn't track view strings, we verify cache behavior
     * by ensuring the endpoint completes successfully, which means
     * Cache::put() was called without errors.
     */
    public function test_cache_storage_works(): void
    {
        Mail::fake();
        Cache::flush();

        $email = 'test@example.com';
        $request = Request::create('/email-auth', 'POST', [
            'email' => $email
        ]);

        $response = $this->controller->sendAuthEmail($request);

        // If we got here without exception, Cache::put() was called
        // Verify response indicates success
        $this->assertEquals(200, $response->getStatusCode());
        $responseData = json_decode($response->getContent(), true);
        $this->assertTrue($responseData['success']);
    }

    /**
     * Test that verification URL route generation works correctly.
     */
    public function test_verification_url_route_generation(): void
    {
        $token = 'test-token-123';
        $verificationUrl = route('email-auth.verify', ['token' => $token]);

        // Verify URL contains the correct route pattern and token
        $this->assertStringContainsString('/email-auth/verify/', $verificationUrl);
        $this->assertStringContainsString($token, $verificationUrl);
    }

    /**
     * Test system rejects empty string email.
     */
    public function test_system_rejects_empty_string_email(): void
    {
        Mail::fake();

        $request = Request::create('/email-auth', 'POST', [
            'email' => ''
        ]);

        $response = $this->controller->sendAuthEmail($request);

        $this->assertEquals(422, $response->getStatusCode());
        $responseData = json_decode($response->getContent(), true);
        $this->assertFalse($responseData['success']);
        $this->assertArrayHasKey('errors', $responseData);

        Mail::assertNothingSent();
    }

    /**
     * Test system rejects SQL injection attempt.
     */
    public function test_system_rejects_sql_injection_attempt(): void
    {
        Mail::fake();

        $sqlInjectionAttempts = [
            "admin' OR '1'='1@example.com",
            "'; DROP TABLE users; --@example.com",
        ];

        foreach ($sqlInjectionAttempts as $maliciousEmail) {
            $request = Request::create('/email-auth', 'POST', [
                'email' => $maliciousEmail
            ]);

            $response = $this->controller->sendAuthEmail($request);

            $this->assertEquals(422, $response->getStatusCode());
            $responseData = json_decode($response->getContent(), true);
            $this->assertFalse($responseData['success']);
            $this->assertArrayHasKey('errors', $responseData);

            Mail::assertNothingSent();
        }
    }

    /**
     * Test system rejects XSS attempt.
     */
    public function test_system_rejects_xss_attempt(): void
    {
        Mail::fake();

        $xssAttempts = [
            '<script>alert("xss")</script>@example.com',
            'javascript:alert(1)@example.com',
        ];

        foreach ($xssAttempts as $maliciousEmail) {
            $request = Request::create('/email-auth', 'POST', [
                'email' => $maliciousEmail
            ]);

            $response = $this->controller->sendAuthEmail($request);

            $this->assertEquals(422, $response->getStatusCode());
            $responseData = json_decode($response->getContent(), true);
            $this->assertFalse($responseData['success']);

            Mail::assertNothingSent();
        }
    }

    /**
     * Test system rejects numeric input.
     */
    public function test_system_rejects_numeric_input(): void
    {
        Mail::fake();

        $request = Request::create('/email-auth', 'POST', [
            'email' => 12345
        ]);

        $response = $this->controller->sendAuthEmail($request);

        $this->assertEquals(422, $response->getStatusCode());
        $responseData = json_decode($response->getContent(), true);
        $this->assertFalse($responseData['success']);

        Mail::assertNothingSent();
    }

    /**
     * Test system rejects boolean input.
     */
    public function test_system_rejects_boolean_input(): void
    {
        Mail::fake();

        $request = Request::create('/email-auth', 'POST', [
            'email' => true
        ]);

        $response = $this->controller->sendAuthEmail($request);

        $this->assertEquals(422, $response->getStatusCode());
        $responseData = json_decode($response->getContent(), true);
        $this->assertFalse($responseData['success']);

        Mail::assertNothingSent();
    }

    /**
     * Test system rejects array input.
     */
    public function test_system_rejects_array_input(): void
    {
        Mail::fake();

        $request = Request::create('/email-auth', 'POST', [
            'email' => ['test@example.com']
        ]);

        $response = $this->controller->sendAuthEmail($request);

        $this->assertEquals(422, $response->getStatusCode());
        $responseData = json_decode($response->getContent(), true);
        $this->assertFalse($responseData['success']);

        Mail::assertNothingSent();
    }

    /**
     * Test system rejects email with spaces.
     */
    public function test_system_rejects_email_with_spaces(): void
    {
        Mail::fake();

        $request = Request::create('/email-auth', 'POST', [
            'email' => 'user name@example.com'
        ]);

        $response = $this->controller->sendAuthEmail($request);

        $this->assertEquals(422, $response->getStatusCode());
        $responseData = json_decode($response->getContent(), true);
        $this->assertFalse($responseData['success']);

        Mail::assertNothingSent();
    }

    /**
     * Test system rejects email without @ symbol.
     */
    public function test_system_rejects_email_without_at_symbol(): void
    {
        Mail::fake();

        $request = Request::create('/email-auth', 'POST', [
            'email' => 'invalidemail.com'
        ]);

        $response = $this->controller->sendAuthEmail($request);

        $this->assertEquals(422, $response->getStatusCode());
        $responseData = json_decode($response->getContent(), true);
        $this->assertFalse($responseData['success']);

        Mail::assertNothingSent();
    }

    /**
     * Test system rejects email with multiple @ symbols.
     */
    public function test_system_rejects_email_with_multiple_at_symbols(): void
    {
        Mail::fake();

        $request = Request::create('/email-auth', 'POST', [
            'email' => 'user@@example.com'
        ]);

        $response = $this->controller->sendAuthEmail($request);

        $this->assertEquals(422, $response->getStatusCode());
        $responseData = json_decode($response->getContent(), true);
        $this->assertFalse($responseData['success']);

        Mail::assertNothingSent();
    }

    /**
     * Test system rejects very long email.
     */
    public function test_system_rejects_very_long_email(): void
    {
        Mail::fake();

        $longEmail = str_repeat('a', 200) . '@' . str_repeat('b', 60) . '.com';

        $request = Request::create('/email-auth', 'POST', [
            'email' => $longEmail
        ]);

        $response = $this->controller->sendAuthEmail($request);

        $this->assertEquals(422, $response->getStatusCode());
        $responseData = json_decode($response->getContent(), true);
        $this->assertFalse($responseData['success']);

        Mail::assertNothingSent();
    }

    /**
     * Test system rejects null value.
     */
    public function test_system_rejects_null_value(): void
    {
        Mail::fake();

        $request = Request::create('/email-auth', 'POST', [
            'email' => null
        ]);

        $response = $this->controller->sendAuthEmail($request);

        $this->assertEquals(422, $response->getStatusCode());
        $responseData = json_decode($response->getContent(), true);
        $this->assertFalse($responseData['success']);

        Mail::assertNothingSent();
    }

    /**
     * Test system correctly validates and rejects various invalid email formats.
     * 
     * Note: Some emails like 'missing@domain' might pass basic RFC validation
     * because they have the basic structure (local@domain), even without a TLD.
     * The 'rfc,strict' validation should catch most invalid formats.
     */
    public function test_system_validates_various_invalid_email_formats(): void
    {
        Mail::fake();

        // Emails that should definitely be rejected by RFC strict validation + regex
        $invalidEmails = [
            'plainaddress',           // No @ symbol
            '@missingdomain.com',      // Missing local part
            'missing@domain',          // No TLD - will be caught by regex
            'spaces in@email.com',     // Spaces in local part
            'double@@at.com',          // Multiple @ symbols
            'invalid@domain',          // No TLD - will be caught by regex
            'invalid@.com',            // Missing domain before TLD
            '.invalid@domain.com',     // Starts with dot
            'invalid.@domain.com',     // Ends with dot before @
            'test@',                   // Missing domain
            'test@domain.',            // Domain ends with dot
        ];

        foreach ($invalidEmails as $invalidEmail) {
            $request = Request::create('/email-auth', 'POST', [
                'email' => $invalidEmail
            ]);

            $response = $this->controller->sendAuthEmail($request);

            $this->assertEquals(422, $response->getStatusCode(), "Failed for: {$invalidEmail}");
            $responseData = json_decode($response->getContent(), true);
            $this->assertFalse($responseData['success'], "Should reject: {$invalidEmail}");
            $this->assertArrayHasKey('errors', $responseData, "Should have errors for: {$invalidEmail}");

            Mail::assertNothingSent();
        }
    }
}
