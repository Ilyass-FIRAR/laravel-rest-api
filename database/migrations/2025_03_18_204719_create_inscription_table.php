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
        Schema::create('inscription', function (Blueprint $table) {
            $table->id();
            $table->date("dateinscription");
            $table->string("codegroupe");
            $table->unsignedBigInteger("idstagiaire");
            $table->foreign("codegroupe")->references("codeGroupe")->on("groupes")->onDelete("cascade");
            $table->foreign('idstagiaire')->references("id")->on('stagiaires')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscription');
    }
};
