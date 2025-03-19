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
            $table->id();
            $table->string("nom");
            $table->string("prenom");
            $table->date("datenaissance")->nullable();
            $table->decimal("poids",5,2)->nullable();
            $table->integer("taille")->nullable();
            $table->string("email")->unique()->nullable();
            $table->string("telephone")->nullable();
            $table->timestamps();//Ajoute la colonne created_at() et updated_at()
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
