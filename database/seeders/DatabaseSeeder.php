<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // RADU
        User::create([
            'name' => 'Admin Radu Alagel',
            'email' => 'info@stanceland.com',
            'password' => Hash::make('Stanceland2014@'),
            'role' => 'admin'
        ]);

        // SUPER ADMIN
        User::create([
            'name' => 'Superadmin Sascha Guida',
            'email' => 'sascha@stanceland.com',
            'password' => Hash::make('SaschaStanceland2014@'),
            'role' => 'admin'
        ]);

        // UTENTE DI TEST
        User::create([
            'name' => 'Test User',
            'email' => 'testuser@stanceland.com',
            'password' => Hash::make('TestStanceland2024@'),
            'role' => 'user'
        ]);

        Event::create([
            'titolo' => 'Stanceland The Noble',
            'data' => '2025-04-26',
            'descrizione' => 'Evento per veicoli fino all’anno 2000. Atmosfera unica tra edifici storici.',
            'immagine' => 'img/eventi/eventonord.jpg',
            'abilita_ticket' => true,
            'abilita_selezione' => true,
            'link_info' => '/events/nord',
            'link_ticket' => '#', // aggiorna se hai un link reale
            'slug' => 'nord',
        ]);

        Event::create([
            'titolo' => 'Stanceland Ceprano',
            'data' => '2025-09-01',
            'descrizione' => 'Una location immersa nel verde, perfetta per un raduno indimenticabile.',
            'immagine' => 'img/eventi/eventosud.jpg',
            'abilita_ticket' => false,
            'abilita_selezione' => true,
            'link_info' => '/events/sud',
            'link_ticket' => null,
            'slug' => 'sud',
        ]);

        Event::create([
            'titolo' => 'Stanceland Giappone',
            'data' => '2025-04-26',
            'descrizione' => 'Evento in giappone',
            'immagine' => 'img/eventi/eventogiappone.jpg',
            'abilita_ticket' => true,
            'abilita_selezione' => true,
            'link_info' => '/events/giappone',
            'link_ticket' => '#', // aggiorna se hai un link reale
            'slug' => 'giappone',
        ]);
    }
}
