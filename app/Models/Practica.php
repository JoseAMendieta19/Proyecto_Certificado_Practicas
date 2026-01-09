<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Practica extends Model
{
    protected $fillable = [
        'user_id',
        'tipo',
        'lugar_practica',
        'horas_requeridas',
        'estado',
        'archivo_url'
    ];

    public function estudiante()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
