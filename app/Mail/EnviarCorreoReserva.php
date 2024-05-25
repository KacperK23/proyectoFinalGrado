<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Reserva;

class EnviarCorreoReserva extends Mailable
{
    use Queueable, SerializesModels;

    public $reserva;
    public $pdfContents;
    /**
     * Create a new message instance.
     */
    public function __construct(Reserva $reserva, $pdfContents)
    {
        $this->reserva = $reserva;
        $this->pdfContents = $pdfContents;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Enviar Correo Reserva',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->view('email')
                    ->subject('Enviar Correo Reserva')
                    ->attachData($this->pdfContents, 'reserva'.$this->reserva->id.'.pdf');
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
