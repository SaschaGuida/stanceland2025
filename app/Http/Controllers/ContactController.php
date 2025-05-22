<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SendGrid;
use SendGrid\Mail\Mail;
use Illuminate\Support\Facades\Log;


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

        $email = new Mail();
        $email->setFrom("selection@stanceland.com", "Stanceland");
        $email->setSubject("Nuovo messaggio dal form contatti");

        $email->addTo("selection@stanceland.com", "Stanceland");
        $email->addContent(
            "text/plain",
            "Hai ricevuto un nuovo messaggio da: {$validated['nome']} {$validated['cognome']} ({$validated['email']})\n\nMessaggio:\n{$validated['messaggio']}"
        );

        try {
            $sendgrid = new SendGrid(getenv('SENDGRID_API_KEY'));
            $response = $sendgrid->send($email);

            if ($response->statusCode() >= 200 && $response->statusCode() < 300) {
                return back()->with('success', 'Messaggio inviato con successo!');
            } else {
                Log::error('Errore invio email SendGrid: ' . $response->body());
                return back()->with('error', 'Errore nell\'invio del messaggio. Riprova più tardi.');
            }
        } catch (\Exception $e) {
            Log::error('Eccezione SendGrid: ' . $e->getMessage());
            return back()->with('error', 'Errore durante l\'invio del messaggio. Riprova più tardi.');
        }
    }
}
