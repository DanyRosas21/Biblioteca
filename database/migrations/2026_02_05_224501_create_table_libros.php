<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre',250);
            $table->string('isbn',100);
            $table->string('autor',250);
            $table->string('editorial',250);
            $table->smallInteger('estatus')->default(0);
            $table->unsignedBigInteger('category_id'); // ← AGREGAR ESTA
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // ← AGREGAR ESTA
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};