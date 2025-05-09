<?php

namespace App\Http\Controllers;

use App\Models\EventApplication;
use Illuminate\Http\Request;

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
                'foto1' => 'nullable|image',
                'foto2' => 'nullable|image',
                'foto3' => 'nullable|image',
            ]);

            foreach (['foto1', 'foto2', 'foto3'] as $foto) {
                if ($request->hasFile($foto)) {
                    $filename = time() . '_' . $foto . '.' . $request->file($foto)->getClientOriginalExtension();
                    $request->file($foto)->move(public_path('img/application'), $filename);
                    $data[$foto] = 'img/application/' . $filename;
                }
            }


            if (EventApplication::where('email', $request->email)->exists()) {
                return redirect()->back()->with('success', 'Hai già inviato la selezione.');
            }

            if (EventApplication::where('anno', $request->email)->exists()) {
                return redirect()->back()->with('success', 'Inserisci un anno valido.');
            }

            EventApplication::create($data);

            return redirect()->back()->with('success', 'Application submitted successfully!');
        }

        $evento = $request->query('evento');

        $titolo = match ($evento) {
            'nord' => 'Application Form Stanceland Nord',
            'sud' => 'Application Form Stanceland Ceprano-Falvaterra',
            default => 'Application Form'
        };

        return view('events.applications', compact('titolo'));
    }
}
