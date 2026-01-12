<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Institucion;
use App\Models\User;

class Carrera extends Model
{
    use HasFactory;

    protected $table = 'carreras';

    protected $fillable = [
        'nombre',
        'institucion_id',
    ];

    // 🔹 Una carrera pertenece a una institución
    public function institucion()
    {
        return $this->belongsTo(Institucion::class, 'institucion_id');
    }

    // 🔹 Una carrera tiene muchos usuarios (estudiantes)
    public function users()
    {
        return $this->hasMany(User::class, 'carrera_id');
    }
}
