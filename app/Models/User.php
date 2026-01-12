<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Practica;
use App\Models\Institucion;
use App\Models\Carrera;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nombres',
        'apellidos',
        'cedula',
        'email',
        'password',
        'institucion_id',
        'carrera_id',
        'rol',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // 🔹 Un estudiante tiene muchas prácticas
    public function practicas()
    {
        return $this->hasMany(Practica::class);
    }

    // 🔹 Un usuario pertenece a una institución
    public function institucion()
    {
        return $this->belongsTo(Institucion::class, 'institucion_id');
    }

    // 🔹 Un usuario pertenece a una carrera
    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'carrera_id');
    }
}
