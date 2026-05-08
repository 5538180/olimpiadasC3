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
        Schema::create('categorias_ediciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoria_id')->constrained()->cascadeOnDelete();
            $table->foreignId('edicion_id')->constrained('ediciones')->cascadeOnDelete();
            $table->integer('num_convocatoria')->nullable();
            $table->unique(['categoria_id', 'edicion_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias_ediciones');
    }
};
