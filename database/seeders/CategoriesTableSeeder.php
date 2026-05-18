<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run(): void
    {
        Category::create(['name' => 'Literatura', 'description' => 'Novelas y cuentos']);
        Category::create(['name' => 'Ciencia Ficción', 'description' => 'Futuro y tecnología']);
        Category::create(['name' => 'Historia', 'description' => 'Libros históricos']);
        Category::create(['name' => 'Infantil', 'description' => 'Para niños']);
    }
}