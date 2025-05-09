<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventApplication extends Model
{
    protected $fillable = [
        'nome',
        'cognome',
        'telefono',
        'email',
        'indirizzo',
        'citta',
        'stato',
        'zip',
        'instagram',
        'marca',
        'modello',
        'anno',
        'modifiche',
        'targa',
        'foto1',
        'foto2',
        'foto3',
        'evento',
    ];
}
