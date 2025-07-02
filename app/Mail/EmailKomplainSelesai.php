<?php

namespace App\Mail;

use App\Models\Pelapor;
use App\Models\Komplain;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;

class EmailKomplainSelesai extends Mailable
{
    use Queueable, SerializesModels;
    public $komplain;
    public $pelapor;

    /**
     * Create a new message instance.
     */
    public function __construct(Komplain $komplain, Pelapor $pelapor)
    {
        $this->pelapor = $pelapor;
        $this->komplain = $komplain;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pemberitahuan: Komplain Anda dengan Tiket #' . $this->komplain->tiket . ' Telah Diselesaikan',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.komplain_selesai',
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
