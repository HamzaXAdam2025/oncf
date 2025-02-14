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
        Schema::create('voyages', function (Blueprint $table) {
            $table->id();
            $table->string('Code_Voyage');
            $table->string('Ville_Depart');
            $table->string('Ville_Arrivee');
            $table->time('Heure_Depart');
            $table->time('Heure_Arrivee');
            $table->double('Prix', 8, 2); // 8 chiffres au total, dont 2 après la virgule
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voyages');
    }
};
