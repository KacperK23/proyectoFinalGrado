<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EnviarCorreoFormularioContacto extends Mailable
{
    use Queueable, SerializesModels;

    public $nombreUsuario;
    public $correoUsuario;
    public $contenidoTexto;
    /**
     * Create a new message instance.
     */
    public function __construct($nombreUsuario, $correoUsuario, $contenidoTexto)
    {
        $this->nombreUsuario = $nombreUsuario;
        $this->correoUsuario = $correoUsuario;
        $this->contenidoTexto = $contenidoTexto;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Enviar Correo Formulario Contacto',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->view('emailFormularioContacto')
                ->subject('Formulario de contacto');
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
