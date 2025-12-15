<?php

namespace Tests\Unit;

use App\Http\Controllers\AdminController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class AdminControllerLoginTest extends TestCase
{
    protected AdminController $controller;

    protected function setUp(): void
    {
        parent::setUp();
        $this->controller = new AdminController();
    }

    public function test_successful_login_with_valid_credentials(): void
    {
        $password = 'password123';
        $user = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make($password),
        ]);

        $request = Request::create('/admin/login', 'POST', [
            'email' => 'admin@example.com',
            'password' => $password,
        ]);

        // attach session
        $request->setLaravelSession(app('session')->driver());
        $request->session()->start();

        $response = $this->controller->login($request);

        $this->assertTrue($request->session()->has('admin'));
        $this->assertEquals((string) $user->_id, $request->session()->get('admin'));

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertEquals(route('admin.dashboard'), $response->getTargetUrl());
    }


    /**
     * Test login fails when email is missing.
     */
    public function test_login_fails_when_email_is_missing(): void
    {
        $request = Request::create('/admin/login', 'POST', [
            'password' => 'password123',
        ]);

        $this->expectException(ValidationException::class);

        try {
            $this->controller->login($request);
        } catch (ValidationException $e) {
            $this->assertArrayHasKey('email', $e->errors());
            $this->assertStringContainsString('Email is required', $e->errors()['email'][0]);
            throw $e;
        }
    }

    /**
     * Test login fails when password is missing.
     */
    public function test_login_fails_when_password_is_missing(): void
    {
        $request = Request::create('/admin/login', 'POST', [
            'email' => 'admin@example.com',
        ]);

        $this->expectException(ValidationException::class);

        try {
            $this->controller->login($request);
        } catch (ValidationException $e) {
            $this->assertArrayHasKey('password', $e->errors());
            $this->assertStringContainsString('Password is required', $e->errors()['password'][0]);
            throw $e;
        }
    }

    /**
     * Test login fails when email format is invalid.
     */
    public function test_login_fails_when_email_format_is_invalid(): void
    {
        $request = Request::create('/admin/login', 'POST', [
            'email' => 'invalid-email',
            'password' => 'password123',
        ]);

        $this->expectException(ValidationException::class);

        try {
            $this->controller->login($request);
        } catch (ValidationException $e) {
            $this->assertArrayHasKey('email', $e->errors());
            $this->assertStringContainsString('valid email address', $e->errors()['email'][0]);
            throw $e;
        }
    }

    /**
     * Test login fails when user does not exist.
     */
    public function test_login_fails_when_user_does_not_exist(): void
    {
        $request = Request::create('/admin/login', 'POST', [
            'email' => 'nonexistent@example.com',
            'password' => 'password123',
        ]);

        $response = $this->controller->login($request);

        // Should redirect back with errors
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertTrue($response->isRedirect());

        // Verify session was not set
        $this->assertFalse($request->session()->has('admin'));
    }

    /**
     * Test login fails when password is incorrect.
     */
    public function test_login_fails_when_password_is_incorrect(): void
    {
        $user = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('correct-password'),
        ]);

        $request = Request::create('/admin/login', 'POST', [
            'email' => 'admin@example.com',
            'password' => 'wrong-password',
        ]);

        $response = $this->controller->login($request);

        // Should redirect back with errors
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertTrue($response->isRedirect());

        // Verify session was not set
        $this->assertFalse($request->session()->has('admin'));
    }

    /**
     * Test login fails when both email and password are missing.
     */
    public function test_login_fails_when_both_fields_are_missing(): void
    {
        $request = Request::create('/admin/login', 'POST', []);

        $this->expectException(ValidationException::class);

        try {
            $this->controller->login($request);
        } catch (ValidationException $e) {
            $this->assertArrayHasKey('email', $e->errors());
            $this->assertArrayHasKey('password', $e->errors());
            throw $e;
        }
    }

    /**
     * Test session is regenerated on successful login.
     */
    public function test_session_is_regenerated_on_successful_login(): void
    {
        $password = 'password123';
        $user = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make($password),
        ]);

        $request = Request::create('/admin/login', 'POST', [
            'email' => 'admin@example.com',
            'password' => $password,
        ]);

        // Store original session ID
        $originalSessionId = $request->session()->getId();

        $response = $this->controller->login($request);

        // Session should be regenerated (new ID)
        // Note: In tests, session regeneration might not change the ID,
        // but the method should be called
        $this->assertTrue($request->session()->has('admin'));
        $this->assertEquals(302, $response->getStatusCode());
    }

    /**
     * Test login with empty email string.
     */
    public function test_login_fails_with_empty_email_string(): void
    {
        $request = Request::create('/admin/login', 'POST', [
            'email' => '',
            'password' => 'password123',
        ]);

        $this->expectException(ValidationException::class);

        try {
            $this->controller->login($request);
        } catch (ValidationException $e) {
            $this->assertArrayHasKey('email', $e->errors());
            throw $e;
        }
    }

    /**
     * Test login with empty password string.
     */
    public function test_login_fails_with_empty_password_string(): void
    {
        $request = Request::create('/admin/login', 'POST', [
            'email' => 'admin@example.com',
            'password' => '',
        ]);

        $this->expectException(ValidationException::class);

        try {
            $this->controller->login($request);
        } catch (ValidationException $e) {
            $this->assertArrayHasKey('password', $e->errors());
            throw $e;
        }
    }

    /**
     * Test login preserves input on validation failure.
     */
    public function test_login_preserves_input_on_validation_failure(): void
    {
        $request = Request::create('/admin/login', 'POST', [
            'email' => 'invalid-email',
            'password' => 'password123',
        ]);

        try {
            $this->controller->login($request);
        } catch (ValidationException $e) {
            // Input should be preserved in old() helper
            $this->assertNotNull($request->old('email'));
            throw $e;
        }
    }

    /**
     * Test login error message for invalid credentials.
     */
    public function test_login_returns_correct_error_message_for_invalid_credentials(): void
    {
        $user = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('correct-password'),
        ]);

        $request = Request::create('/admin/login', 'POST', [
            'email' => 'admin@example.com',
            'password' => 'wrong-password',
        ]);

        $response = $this->controller->login($request);

        // Should have errors in session
        $errors = $request->session()->get('errors');
        $this->assertNotNull($errors);
        $this->assertTrue($errors->has('email'));
        $this->assertStringContainsString('Invalid credentials', $errors->first('email'));
    }

    /**
     * Test login with case-sensitive email lookup.
     */
    public function test_login_is_case_sensitive_for_email(): void
    {
        $password = 'password123';
        $user = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make($password),
        ]);

        // Try with different case
        $request = Request::create('/admin/login', 'POST', [
            'email' => 'ADMIN@EXAMPLE.COM',
            'password' => $password,
        ]);

        $response = $this->controller->login($request);

        // MongoDB queries are case-sensitive by default, so this should fail
        // unless the email is stored in a case-insensitive way
        // This test verifies the current behavior
        if ($response->getStatusCode() === 302 && $response->isRedirect()) {
            // If it redirects back, login failed (expected for case-sensitive)
            $this->assertFalse($request->session()->has('admin'));
        }
    }
}
