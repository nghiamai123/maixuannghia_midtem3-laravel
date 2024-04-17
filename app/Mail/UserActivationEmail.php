<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserActivationEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'User Activation Email',
        );
    }

    /**
     * Get the message content definition.
     */
    /**
 * Get the message content definition.
 */
public function content(): Content
{
    return (new Content('name'))
        ->with([
            'your-name' => $this->data['your-name'],
            'your-email' => $this->data['your-email'],
            'your-subject' => $this->data['your-subject'],
            'your-message' => $this->data['your-message'],
        ]);
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
