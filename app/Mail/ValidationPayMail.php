<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ValidationPayMail extends Mailable
{
    use Queueable, SerializesModels;
    public $sale;
    public $client;
    public $tickets;
    /**
     * Create a new message instance.
     */
    public function __construct($sale, $client, $tickets)
    {
        //
        $this->sale = $sale;
        $this->client = $client;
        $this->tickets = $tickets;
    }


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Validation Pay Mail',
        );
    }


    public function content(): Content
    {
        return new Content(
            view: 'mail.validatePay',
            with: [
                'sale' => $this->sale,
                'client' => $this->client,
                'tickets' => $this->tickets
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
