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
        Schema::create('stagiaires', function (Blueprint $table) {
            $table->id(); // Equivalent de BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY
            $table->string('nom');
            $table->string('prenom');
            $table->date('datenaissance')->nullable(); // nullable() permet les valeurs nulles
            $table->decimal('poids', 5, 2)->nullable();
            $table->integer('taille')->nullable();
            $table->string('photo')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('ville')->nullable();
            $table->string('telephone')->nullable();
            $table->timestamps(); // Ajoute les colonnes created_at et updated_at    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stagiaires');
    }
};
