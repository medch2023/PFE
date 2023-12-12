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
        Schema::dropIfExists('roles'); // Ajoutez cette ligne pour supprimer la table si elle existe déjà

    Schema::create('roles', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        // Ajoutez d'autres colonnes si nécessaire

        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
