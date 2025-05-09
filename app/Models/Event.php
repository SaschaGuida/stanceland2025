<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'titolo',
        'data',
        'descrizione',
        'immagine',
        'abilita_ticket',
        'abilita_selezione',
        'link_info',
        'link_ticket',
    ];
}
