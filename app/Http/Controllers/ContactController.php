<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string'
        ]);

        try {
            // Kirim email
            Mail::raw(
                "Pesan baru dari Contact Form:\n\n" .
                "Nama: {$validated['name']}\n" .
                "Email: {$validated['email']}\n\n" .
                "Pesan:\n{$validated['message']}",
                function ($message) use ($validated) {
                    $message->to('contact.glucoguide@gmail.com')
                            ->subject('Contact Form dari ' . $validated['name'])
                            ->replyTo($validated['email'], $validated['name']);
                }
            );

            return back()->with('success', 'Pesan berhasil dikirim!');
            
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengirim pesan: ' . $e->getMessage());
        }
    }
}