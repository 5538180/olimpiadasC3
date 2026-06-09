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
        Schema::create('puntuaciones', function (Blueprint $table) {
            $table->id();

            /* * Usuario que ha realizado la prueba */
            $table->foreignId('participante_id')->constrained('users')->cascadeOnDelete();

            /* * Usuario (juez) que ha otorgado la puntuación */
            $table->foreignId('juez_id')->constrained('users')->cascadeOnDelete();

            $table->integer('puntos')->default(0);
            $table->string('comentario')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puntuaciones');
    }
};
