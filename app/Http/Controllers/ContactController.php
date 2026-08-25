<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'    => ['required', 'string', 'max:100'],
            'email'   => ['required', 'email', 'max:150'],
            'message' => ['required', 'string', 'max:2000'],
        ], [
            'name.required'    => 'Nama wajib diisi.',
            'email.required'   => 'Email wajib diisi.',
            'email.email'      => 'Format email tidak valid.',
            'message.required' => 'Pesan wajib diisi.',
        ]);

        // Sementara pesan hanya dicatat di log.
        // Nanti bisa diganti mengirim email (Mail::to(...)->send(...))
        // atau disimpan ke database (buat model+migration ContactMessage).
        Log::info('Pesan kontak baru dari website portofolio', $data);

        return back()
            ->with('contact_success', 'Terima kasih, pesan Anda sudah terkirim. Saya akan segera membalas.')
            ->withInput();
    }
}
