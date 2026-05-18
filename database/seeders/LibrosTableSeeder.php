<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Libro;

class LibrosTableSeeder extends Seeder
{
    public function run(): void
    {
        Libro::create([
            'nombre' => 'Cien años de soledad',
            'isbn' => '978-0307474728',
            'autor' => 'Gabriel García Márquez',
            'editorial' => 'Sudamericana',
            'category_id' => 1
        ]);

        Libro::create([
            'nombre' => '1984',
            'isbn' => '978-0451524935',
            'autor' => 'George Orwell',
            'editorial' => 'Secker & Warburg',
            'category_id' => 2
        ]);

        Libro::create([
            'nombre' => 'Don Quijote de la Mancha',
            'isbn' => '978-8420732855',
            'autor' => 'Miguel de Cervantes',
            'editorial' => 'Francisco de Robles',
            'category_id' => 1
        ]);
    }
}