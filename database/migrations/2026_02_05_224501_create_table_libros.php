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
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre', 250);
            $table->string('isbn', 100);
            $table->string('autor', 250);
            $table->string('nombre', 250);
            $table->string('editorial', 250);
            $table->smallinteger('editorial')->default(0);
            $table->smallinteger('editorial')->default(0);
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_libros');
    }
};
