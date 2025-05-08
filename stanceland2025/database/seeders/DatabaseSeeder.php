<?php

namespace Database\Seeders;

use App\Models\User;
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
        ]);

        // SUPER ADMIN
        User::create([
            'name' => 'Superadmin Sascha Guida',
            'email' => 'sascha@stanceland.com',
            'password' => Hash::make('SaschaStanceland2014@'),
        ]);

        // UTENTE DI TEST
        User::create([
            'name' => 'Test User',
            'email' => 'testuser@stanceland.com',
            'password' => Hash::make('TestStanceland2024@'),
        ]);
    }
}
