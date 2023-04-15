<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DnsVerified extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;


    protected string $shortdomain_host;

    /**
     * Create a new message instance.
     */
    public function __construct( string $shortdomain_host )
    {
        $this->shortdomain_host = $shortdomain_host;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '✔️ Your short domain is active!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.dns-verified',
            with: [
                'shortdomain' => $this->shortdomain_host
            ]
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
