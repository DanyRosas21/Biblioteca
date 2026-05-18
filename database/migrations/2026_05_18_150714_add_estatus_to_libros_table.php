<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('libros', function (Blueprint $table) {
            // Agregar columna estatus si no existe
            if (!Schema::hasColumn('libros', 'estatus')) {
                $table->smallInteger('estatus')->default(0);
            }
        });
    }

    public function down(): void
    {
        Schema::table('libros', function (Blueprint $table) {
            if (Schema::hasColumn('libros', 'estatus')) {
                $table->dropColumn('estatus');
            }
        });
    }
};