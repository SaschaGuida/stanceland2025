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
        Schema::create('events', function (Blueprint $table) {
    $table->id();
    $table->string('titolo');
    $table->date('data');
    $table->text('descrizione');
    $table->string('immagine');
    $table->boolean('abilita_ticket')->default(false);
    $table->boolean('abilita_selezione')->default(false);
    $table->string('link_info')->nullable();
    $table->string('link_ticket')->nullable();
    $table->string('slug')->unique(); // es: "nord" o "sud"
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
