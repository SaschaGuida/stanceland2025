<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class PublicEventController extends Controller
{
    public function index()
{
    $eventoNord = Event::where('slug', 'nord')->firstOrFail();
    $eventoSud = Event::where('slug', 'sud')->firstOrFail();
    $eventoGiappone = Event::where('slug', 'giappone')->firstOrFail();

    return view('event', compact('eventoNord', 'eventoSud', 'eventoGiappone'));
}
}
