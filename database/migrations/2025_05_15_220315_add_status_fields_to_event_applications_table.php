<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('event_applications', function (Blueprint $table) {
            $table->boolean('selezionato')->nullable()->after('targa');
            $table->boolean('pagato')->nullable()->after('selezionato');
        });
    }

    public function down()
    {
        Schema::table('event_applications', function (Blueprint $table) {
            $table->dropColumn(['selezionato', 'pagato']);
        });
    }
};
