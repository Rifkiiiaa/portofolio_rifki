<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        return back()
            ->with('contact_success', 'Terima kasih, pesan Anda sudah terkirim via WhatsApp.')
            ->withInput();
    }
}
