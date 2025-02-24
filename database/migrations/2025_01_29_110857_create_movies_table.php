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
        Schema::create('movies', function (Blueprint $table) {
            $table->id(); // Campo "id" autoincremental
            $table->string('title'); // Campo "title" de tipo string
            $table->string('year', 4); // Campo "year" de tipo string con longitud 4
            $table->string('director', 64); // Campo "diector" de tipo string con longitud 64
            $table->string('poster'); // Campo "poster" de tipo string
            $table->boolean('rented')->default(false); // Campo "rented" de tipo booleano con valor por defecto false
            $table->text('synopsis'); // Campo "synopsis" de tipo text
            $table->timestamps(); // Campos "created_at" y "updated_at" de tipo timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
