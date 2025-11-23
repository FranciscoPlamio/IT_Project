<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\EmailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:email 
                            {email : The email address to send to}
                            {--fake : Use Mail::fake() for testing}
                            {--view : Show email view instead of sending}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test sending authentication email via command line';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');

        if ($this->option('fake')) {
            Mail::fake();
            $this->info("Using Mail::fake() - email won't actually be sent");
        }

        $this->info("Sending authentication email to: {$email}");
        $this->newLine();

        $controller = new EmailController();

        // Create a request with the email
        $request = Request::create('/email-auth', 'POST', [
            'email' => $email
        ]);

        try {
            $response = $controller->sendAuthEmail($request);
            $responseData = json_decode($response->getContent(), true);

            if ($response->getStatusCode() === 200 && ($responseData['success'] ?? false)) {
                $this->info("✓ Email sent successfully!");
                $this->line("Message: " . ($responseData['message'] ?? 'N/A'));
                $this->line("Email: " . ($responseData['email'] ?? 'N/A'));

                if ($this->option('fake')) {
                    $this->warn("Note: Email was faked and not actually sent");
                } else {
                    $this->info("Check your email inbox for the authentication link");
                }
            } else {
                $this->error("✗ Failed to send email");
                $this->line("Status Code: " . $response->getStatusCode());

                if (isset($responseData['errors'])) {
                    $this->error("Validation Errors:");
                    foreach ($responseData['errors'] as $field => $messages) {
                        foreach ($messages as $message) {
                            $this->line("  - {$field}: {$message}");
                        }
                    }
                } else {
                    $this->line("Response: " . json_encode($responseData, JSON_PRETTY_PRINT));
                }
            }
        } catch (\Exception $e) {
            $this->error("✗ Error: " . $e->getMessage());
            $this->line("Stack trace: " . $e->getTraceAsString());
        }

        return Command::SUCCESS;
    }
}
