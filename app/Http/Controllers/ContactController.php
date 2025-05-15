<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string',
            'cognome' => 'required|string',
            'email' => 'required|email',
            'messaggio' => 'required|string',
        ]);

        Mail::to('sascha.guida@gmail.com')->send(new ContactMessage($validated));

        return back()->with('success', 'Messaggio inviato con successo!');
    }
}
