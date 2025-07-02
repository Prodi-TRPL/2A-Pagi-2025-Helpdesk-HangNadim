<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewComplaintEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $komplain;
    public $pelapor;

    /**
     * Create a new message instance.
     */
    public function __construct($komplain, $pelapor)
    {
        $this->komplain = $komplain;
        $this->pelapor = $pelapor;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject:  'Pemberitahuan: Komplain Baru Masuk (Tiket #' . $this->komplain->tiket . ')',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.komplain_baru',
            with: [
                'komplain' => $this->komplain,
                'pelapor' => $this->pelapor
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
