<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practica extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tipo',
        'lugar_practica_id',      // 🆕 Nueva FK
        'horas_requeridas',
        'fecha_inicio',           // 🆕
        'fecha_finalizacion',     // 🆕
        'estado',
        'archivo_url',
        'observaciones'           // 🆕
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_finalizacion' => 'date',
    ];

    // ✅ Ya la tenías - Relación con estudiante
    public function estudiante()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // 🆕 Nueva relación con lugar de práctica
    public function lugarPractica()
    {
        return $this->belongsTo(LugarPractica::class, 'lugar_practica_id');
    }

    // 🆕 Métodos auxiliares útiles
    public function scopePendientesRevision($query)
    {
        return $query->where('estado', 'pendiente_revision');
    }

    public function scopeAprobadas($query)
    {
        return $query->where('estado', 'aprobada');
    }

    public function scopePorEstudiante($query, $userId)
    {
        return $query->where('user_id', $userId);
    }
}