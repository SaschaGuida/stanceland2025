<?php

namespace App\Http\Controllers;

use App\Models\EventApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
                'anno' => 'required|integer|min:1960|max:' . $annoCorrente,
                'modifiche' => 'required|string',
                'targa' => 'required|string',
                'foto1' => 'nullable|image|max:2048',
                'foto2' => 'nullable|image|max:2048',
                'foto3' => 'nullable|image|max:2048',
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
                Mail::raw("Ciao {$user->name},\n\nBenvenuto su Stanceland!\n\nPuoi accedere alla tua dashboard con:\n\nEmail: {$user->email}\nPassword: {$password}\n\nTi consigliamo di cambiarla al primo accesso.", function ($message) use ($user) {
                    $message->to($user->email)
                            ->subject('Accesso alla tua dashboard Stanceland');
                });
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
