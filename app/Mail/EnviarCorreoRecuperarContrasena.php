<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EnviarCorreoRecuperarContrasena extends Mailable
{
    use Queueable, SerializesModels;

    public $contrasena;
    public $emailUsuario;
    /**
     * Create a new message instance.
     */
    public function __construct($contrasena,$emailUsuario)
    {
        $this->contrasena = $contrasena;
        $this->emailUsuario = $emailUsuario;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Enviar Correo Recuperar Contrasena',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->view('emailRecuperarContrasena')
                ->subject('Recuperar contraseña');
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
