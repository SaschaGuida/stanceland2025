<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
    Schema::create('event_applications', function (Blueprint $table) {
        $table->id();
        $table->string('nome');
        $table->string('cognome');
        $table->string('telefono');
        $table->string('email');
        $table->string('indirizzo');
        $table->string('citta');
        $table->string('stato');
        $table->string('zip');
        $table->string('instagram')->nullable();
        $table->string('marca');
        $table->string('modello');
        $table->year('anno');
        $table->text('modifiche');
        $table->string('targa');
        $table->string('foto1')->nullable();
        $table->string('foto2')->nullable();
        $table->string('foto3')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_applications');
    }
};
