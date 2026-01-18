<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practica extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'anio_lectivo',
        'tipo',
        'lugar_practica_id',      
        'horas_requeridas',
        'fecha_inicio',           
        'fecha_finalizacion',     
        'estado',
        'archivo_url',
        'observaciones'           
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

    // 🆕 NUEVO: Scope para filtrar por año lectivo
    public function scopePorAnioLectivo($query, $anioLectivo)
    {
        return $query->where('anio_lectivo', $anioLectivo);
    }

    // 🆕 NUEVO: Método estático para generar opciones de años lectivos
    public static function obtenerAniosLectivos()
    {
        $anios = [];
        $anioActual = date('Y');
        
        // Genera años desde 1 año atrás hasta 2 años adelante
        for ($i = -1; $i <= 2; $i++) {
            $anio = $anioActual + $i;
            $anios[] = "$anio-1"; // Primer semestre
            $anios[] = "$anio-2"; // Segundo semestre
        }
        
        return $anios;
    }

    // 🆕 NUEVO: Obtener el año lectivo actual basado en la fecha
    public static function obtenerAnioLectivoActual()
    {
        $mes = date('n'); // Mes numérico (1-12)
        $anio = date('Y');
        
        // Lógica: Enero-Julio = semestre 1, Agosto-Diciembre = semestre 2
        $semestre = ($mes <= 7) ? '1' : '2';
        
        return "$anio-$semestre";
    }
}