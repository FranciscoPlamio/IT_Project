<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AuthMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The email address.
     *
     * @var string
     */
    public $email;

    /**
     * The verification token.
     *
     * @var string
     */
    public $token;

    /**
     * The verification URL.
     *
     * @var string
     */
    public $verification_url;

    /**
     * Create a new message instance.
     */
    public function __construct($email, $token, $verification_url)
    {
        $this->email = $email;
        $this->token = $token;
        $this->verification_url = $verification_url;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Email Authentication - NTC Forms System',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.auth-email',
            with: [
                'email' => $this->email,
                'token' => $this->token,
                'verification_url' => $this->verification_url,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
