<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LugarPractica extends Model
{
    use HasFactory;

    protected $table = 'lugares_practica';

    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'email',
        'activo'
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];

    // Relación: Un lugar tiene muchas prácticas
    public function practicas()
    {
        return $this->hasMany(Practica::class, 'lugar_practica_id');
    }
}