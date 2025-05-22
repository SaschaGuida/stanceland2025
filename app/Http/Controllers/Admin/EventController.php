<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index()
    {
        $eventoNord = Event::where('slug', 'nord')->first();
        $eventoSud = Event::where('slug', 'sud')->first();
        $eventoGiappone = Event::where('slug', 'giappone')->first();

        return view('admin.eventi', compact('eventoNord', 'eventoSud', 'eventoGiappone'));
    }

    public function edit(Event $event)
    {
        return view('admin.eventi.edit', compact('event'));
    }

public function update(Request $request, $slug)
{
    $event = Event::where('slug', $slug)->firstOrFail();

    $data = $request->validate([
        'titolo' => 'required|string|max:255',
        'descrizione' => 'required|string',
        'data' => 'required|date',
        'immagine' => 'nullable|image|max:2048',
    ]);

    // ✅ Gestione checkbox (true se spuntati, false se non presenti)
    $data['abilita_ticket'] = $request->has('mostra_ticket');
    $data['abilita_selezione'] = $request->has('mostra_selezione');

    if ($request->hasFile('immagine')) {
        $filename = time() . '_' . $request->file('immagine')->getClientOriginalName();
        $request->file('immagine')->move(public_path('img/eventi'), $filename);
        $data['immagine'] = 'img/eventi/' . $filename;
    }

    $event->update($data);

    return redirect()->route('admin.eventi')->with('success', 'Evento aggiornato con successo.');
}


}
