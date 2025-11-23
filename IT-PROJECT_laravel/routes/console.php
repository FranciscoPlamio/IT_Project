<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\EmailController;
use Illuminate\Http\Request;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Test email sending command
Artisan::command('test:send-email {email}', function ($email) {
    $controller = new EmailController();

    // Create a request with the email
    $request = Request::create('/email-auth', 'POST', [
        'email' => $email
    ]);

    $this->info("Sending authentication email to: {$email}");

    try {
        $response = $controller->sendAuthEmail($request);
        $responseData = json_decode($response->getContent(), true);

        if ($response->getStatusCode() === 200 && ($responseData['success'] ?? false)) {
            $this->info("✓ Email sent successfully!");
            $this->line("Response: " . $responseData['message']);
        } else {
            $this->error("✗ Failed to send email");
            $this->line("Status: " . $response->getStatusCode());
            $this->line("Response: " . json_encode($responseData, JSON_PRETTY_PRINT));
        }
    } catch (\Exception $e) {
        $this->error("✗ Error: " . $e->getMessage());
    }
})->purpose('Test sending authentication email to a specific email address');
