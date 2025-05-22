<?php

namespace App\Http\Controllers;

use App\Models\EventApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use SendGrid;
use SendGrid\Mail\Mail as SendGridMail;
use Illuminate\Support\Facades\Log;

class EventApplicationController extends Controller
{
    public function handle(Request $request)
    {
        if ($request->isMethod('post')) {
            $annoCorrente = date('Y');

            $data = $request->validate([
                'nome' => 'required|string',
                'cognome' => 'required|string',
                'telefono' => 'required|string',
                'email' => 'required|email',
                'indirizzo' => 'required|string',
                'citta' => 'required|string',
                'stato' => 'required|string',
                'zip' => 'required|string',
                'instagram' => 'nullable|string',
                'marca' => 'required|string',
                'modello' => 'required|string',
                'anno' => 'required|integer|min:1900|max:' . $annoCorrente,
                'modifiche' => 'required|string',
                'targa' => 'required|string',
                'foto1' => 'nullable|image|max:10240',
                'foto2' => 'nullable|image|max:10240',
                'foto3' => 'nullable|image|max:10240',
            ]);

            if (EventApplication::where('email', $data['email'])->exists()) {
                return redirect()->back()->with('success', 'An application associated with this email has already been received.');
            }

            // Salva le immagini
            foreach (['foto1', 'foto2', 'foto3'] as $foto) {
                if ($request->hasFile($foto)) {
                    $filename = time() . '_' . $foto . '.' . $request->file($foto)->getClientOriginalExtension();
                    $request->file($foto)->move(public_path('img/application'), $filename);
                    $data[$foto] = 'img/application/' . $filename;
                }
            }

            // Salva anche l'evento (es. ?evento=nord)
            $data['evento'] = $request->query('evento', 'nord');

            EventApplication::create($data);

            // ✅ CREA UTENTE se non esiste
            if (!User::where('email', $data['email'])->exists()) {
                $password = Str::random(10); // password generata
                $user = User::create([
                    'name' => $data['nome'] . ' ' . $data['cognome'],
                    'email' => $data['email'],
                    'password' => Hash::make($password),
                    'role' => 'user', // assicurati che il campo esista
                ]);

                // ✅ INVIA MAIL CON CREDENZIALI
                try {
                    $email = new SendGridMail();
                    $email->setFrom("selection@stanceland.com", "Stanceland");
                    $email->setSubject("Access to Your Stanceland Dashboard");
                    $email->addTo($user->email, $user->name);
                    $email->addContent(
                        "text/plain",
                        "Hello {$user->name},\n\nWelcome to Stanceland!\n\nYou can access your personal dashboard using the credentials below:\n\nEmail: {$user->email}\nPassword: {$password}\n\nFor your security, we strongly recommend changing your password upon first login.\n\nSee you soon!\nThe Stanceland Team"
                    );

                    $sendgrid = new SendGrid(env('SENDGRID_API_KEY'));
                    $response = $sendgrid->send($email);

                    // ✅ INVIA MAIL DI NOTIFICA A STANCELAND
                    try {
                        $notify = new SendGridMail();
                        $notify->setFrom("selection@stanceland.com", "Stanceland");
                        $notify->setSubject("Nuova Selezione ricevuta{$data['nome']} {$data['cognome']}");
                        $notify->addTo("selection@stanceland.com", "Radu Alagel");
                        $notify->addContent(
                            "text/plain",
                            "Una nuova selezione è stata inviata.\n\nNome: {$data['nome']} {$data['cognome']}\nEmail: {$data['email']}\nEvento: {$data['evento']}\nDate: " . now()->format('d/m/Y') . "\n\nAccedi alla dashboard per vedere i dettagli"
                        );

                        $sendgrid->send($notify);
                        Log::info('Email notifica nuova selezione inviata', ['email' => 'selection@stanceland.com']);
                    } catch (\Exception $e) {
                        Log::error('Errore invio email notifica admin: ' . $e->getMessage());
                    }


                    Log::info('Email utente inviata via SendGrid', ['email' => $user->email, 'status' => $response->statusCode()]);
                } catch (\Exception $e) {
                    Log::error('Errore invio email SendGrid per utente: ' . $e->getMessage());
                }
            }

            return redirect()->back()->with('success', 'Thank you for your submission! You will receive your login credentials via email shortly.');
        }

        $evento = $request->query('evento');

        $titolo = match ($evento) {
            'nord' => 'Application Form Stanceland Nord',
            'sud' => 'Application Form Stanceland Ceprano-Falvaterra',
            'giappone' => 'Application Form Stanceland Giappone',
            default => 'Application Form'
        };

        return view('events.applications', compact('titolo'));
    }
}
