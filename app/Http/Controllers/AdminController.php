<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\EventApplication;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function nord(Request $request)
    {
        $soloSelezionati = $request->query('selezionati') === '1';

        $selezioniNord = EventApplication::where('evento', 'nord')
            ->when($soloSelezionati, function ($query) {
                $query->where('selezionato', true);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.nord', compact('selezioniNord', 'soloSelezionati'));
    }

        public function sud(Request $request)
    {
        $soloSelezionati = $request->query('selezionati') === '1';

        $selezioniSud = EventApplication::where('evento', 'sud')
            ->when($soloSelezionati, function ($query) {
                $query->where('selezionato', true);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.sud', compact('selezioniSud', 'soloSelezionati'));
    }

    public function users()
    {
        return view('admin.users');
    }

    public function eventi()
    {
        return view('admin.eventi');
    }

    public function dettaglio($id)
    {
        $selezione = EventApplication::findOrFail($id);
        return view('admin.dettaglio', compact('selezione'));
    }

    public function aggiornaSelezione(Request $request, $id)
    {
        $selezione = EventApplication::findOrFail($id);

        if ($request->has('selezionato')) {
            $selezione->selezionato = $request->input('selezionato');
        }

        if ($request->has('pagato')) {
            $selezione->pagato = $request->input('pagato');
        }

        $selezione->save();

        return back()->with('success', 'Stato aggiornato.');
    }
}
