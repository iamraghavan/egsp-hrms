<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LoginNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $loginTimestamp;
    public $userName;
    public $ipAddress;
    public $browserInfo;


    

    public function __construct($userName, $ipAddress, $browserInfo, $loginTimestamp)
    {
        $this->userName = $userName;
        $this->ipAddress = $ipAddress;
        $this->browserInfo = $browserInfo;
        $this->loginTimestamp = $loginTimestamp;

    }

    public function build()
    {
        return $this->markdown('emails.login-notification')
            ->subject('EGSP HRMS Login Notification');
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'EGSP HRMS Login Notification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.login-notification',
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
