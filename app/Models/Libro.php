<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Libro extends Model
{
    protected $fillable = [
        'nombre', 
        'isbn', 
        'autor', 
        'editorial', 
        'category_id',
        'estatus'     // ← Agregar esta línea
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}