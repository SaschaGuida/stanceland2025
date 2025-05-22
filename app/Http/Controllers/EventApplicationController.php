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
                return redirect()->back()->with('success', 'Hai già inviato la selezione.');
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
                    $email->setSubject("Accesso alla tua dashboard Stanceland");
                    $email->addTo($user->email, $user->name);
                    $email->addContent(
                        "text/plain",
                        "Ciao {$user->name},\n\nBenvenuto su Stanceland!\n\nPuoi accedere alla tua dashboard con:\n\nEmail: {$user->email}\nPassword: {$password}\n\nTi consigliamo di cambiarla al primo accesso."
                    );

                    $sendgrid = new SendGrid(env('SENDGRID_API_KEY'));
                    $response = $sendgrid->send($email);

                    Log::info('Email utente inviata via SendGrid', ['email' => $user->email, 'status' => $response->statusCode()]);
                } catch (\Exception $e) {
                    Log::error('Errore invio email SendGrid per utente: ' . $e->getMessage());
                }
            }

            return redirect()->back()->with('success', 'Selezione inviata con successo! Controlla la tua email per le credenziali di accesso.');
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
