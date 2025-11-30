<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ResetPasswordCode extends Mailable
{
    use Queueable, SerializesModels;

    // Public property untuk nampung kode verifikasi
    public $verificationCode;

    /**
     * Buat instance pesan baru.
     */
    public function __construct($code)
    {
        // Masukin kode dari controller/route ke property class
        $this->verificationCode = $code;
    }

    /**
     * Ambil data envelope pesan.
     */
    public function envelope(): Envelope
    {
        // Subjek email
        return new Envelope(
            subject: 'Kode Verifikasi Reset Password',
        );
    }

    /**
     * Ambil definisi konten pesan.
     */
    public function content(): Content
    {
        // Nentuin view yang dipake buat konten email
        // Di sini kita pakai view Markdown: emails.reset_password_code
        return new Content(
            markdown: 'emails.reset_password_code',
            // Data $this->verificationCode otomatis bisa diakses di view
        );
    }

    /**
     * Ambil lampiran pesan.
     */
    public function attachments(): array
    {
        return []; // Kalau gak ada lampiran, biarin kosong
    }
}