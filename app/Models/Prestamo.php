<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Libro;
use App\Models\User;

class Prestamo extends Model
{
    protected $fillable = [
        'usuario_id',
        'libro_id',
        'fecha_entrega',
        'estado',
    ];

    protected $table_name = 'prestamos';

    public function libro()
    {
        return $this->belongsTo(Libro::class, 'libro_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
