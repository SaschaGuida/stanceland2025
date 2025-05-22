<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\EventApplication;
use Illuminate\Http\Request;
use App\Models\User;
use SendGrid;
use SendGrid\Mail\Mail as SendGridMail;
use Illuminate\Support\Facades\Log;

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

    public function giappone(Request $request)
    {
        $soloSelezionati = $request->query('selezionati') === '1';

        $selezioniGiappone = EventApplication::where('evento', 'giappone')
            ->when($soloSelezionati, function ($query) {
                $query->where('selezionato', true);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.giappone', compact('selezioniGiappone', 'soloSelezionati'));
    }

    public function users()
    {
        // Recupera solo gli utenti che hanno fatto almeno una selezione
        $usersWithSelections = User::whereHas('selezione')->get();

        return view('admin.users', compact('usersWithSelections'));
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

    /*     public function aggiornaSelezione(Request $request, $id)
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
    } */

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

        // 📧 INVIA EMAIL STATO
        try {
            // Scelta della view e del subject
            if ($selezione->selezionato && $selezione->pagato) {
                $subject = "✅ Your Stanceland application is confirmed and paid!";
                $html = view('emails.selezione-pagata', compact('selezione'))->render();
            } elseif ($selezione->selezionato && !$selezione->pagato) {
                $subject = "🎉 Your car has been selected!";
                $html = view('emails.selezione-non-pagata', compact('selezione'))->render();
            } elseif ($selezione->selezionato === false) {
                $subject = "❌ Application not selected";
                $html = view('emails.selezione-non-selezionato', compact('selezione'))->render();
            } else {
                $subject = "🔍 Application under review";
                $html = view('emails.selezione-in-corso', compact('selezione'))->render();
            }

            // Invio via SendGrid
            $email = new SendGridMail();
            $email->setFrom("selection@stanceland.com", "Stanceland");
            $email->setSubject($subject);
            $email->addTo($selezione->email, $selezione->nome);
            $email->addContent("text/html", $html);

            $sendgrid = new SendGrid(env('SENDGRID_API_KEY'));
            $response = $sendgrid->send($email);

            Log::info('Email inviata correttamente', ['email' => $selezione->email, 'status' => $response->statusCode()]);
        } catch (\Exception $e) {
            Log::error('Errore invio email: ' . $e->getMessage());
        }

        return back()->with('success', 'Stato aggiornato e notifica inviata via email.');
    }
}
