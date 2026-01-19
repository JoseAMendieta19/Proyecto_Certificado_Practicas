<?php

namespace App\Http\Controllers;

use App\Models\Practica;
use Illuminate\Support\Facades\Auth;

class EstudianteController extends Controller
{
    public function dashboard()
    {
        $userId = Auth::id();

        $totalPracticas = Practica::porEstudiante($userId)->count();

        $practicasAsignadas = Practica::porEstudiante($userId)
            ->where('estado', 'asignada')
            ->count();

        $practicasPendientes = Practica::porEstudiante($userId)
            ->pendientesRevision()
            ->count();

        $practicasAprobadas = Practica::porEstudiante($userId)
            ->aprobadas()
            ->count();

        $actividadReciente = Practica::porEstudiante($userId)
            ->latest()
            ->take(5)
            ->get();

        return view('estudiante.dashboard', compact(
            'totalPracticas',
            'practicasAsignadas',
            'practicasPendientes',
            'practicasAprobadas',
            'actividadReciente'
        ));
    }

    public function practicas()
    {
        $practicas = Practica::porEstudiante(Auth::id())
            ->latest()
            ->get();

        return view('estudiante.practicas', compact('practicas'));
    }


    /**
     * Mostrar página de certificados del estudiante
     */
    public function certificados()
    {
        $estudiante = Auth::user();
        
        // Cargar las prácticas del estudiante con sus relaciones
        $estudiante->load(['practicas.lugarPractica', 'carrera']);
        
        return view('estudiante.certificados');
    }
}
