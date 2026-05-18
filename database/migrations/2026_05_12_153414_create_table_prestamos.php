<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('fecha_entrega')->nullable();
            $table->string('estado')->default('pendiente');
            $table->unsignedBigInteger('libro_id');
            $table->unsignedBigInteger('usuario_id');

            $table->foreign('libro_id')->references('id')->on('libros')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};
