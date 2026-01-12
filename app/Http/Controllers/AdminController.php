<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Practica;
use App\Models\LugarPractica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    /**
     * Dashboard con listado de estudiantes
     */
    public function dashboard()
    {
        $estudiantes = User::where('rol', 'estudiante')
            ->with(['practicas.lugarPractica', 'institucion', 'carrera'])
            ->get();

        return view('admin.estudiantes.index', compact('estudiantes'));
    }

    /**
     * Mostrar formulario de asignación
     */
    public function asignarPracticaForm($id)
    {
        $estudiante = User::with(['practicas', 'institucion', 'carrera'])->findOrFail($id);
        
        // Obtener prácticas existentes
        $practicaI = $estudiante->practicas->where('tipo', 'I')->first();
        $practicaII = $estudiante->practicas->where('tipo', 'II')->first();
        
        // Obtener lugares activos
        $lugaresPractica = LugarPractica::where('activo', true)->get();

        return view('admin.estudiantes.asignar', compact('estudiante', 'practicaI', 'practicaII', 'lugaresPractica'));
    }

    /**
     * Guardar nueva práctica
     */
    public function guardarPractica(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'tipo' => 'required|in:I,II',
            'lugar_practica_id' => 'required|exists:lugares_practica,id',
            'horas_requeridas' => 'required|integer|min:1|max:500',
            'fecha_inicio' => 'required|date',
            'observaciones' => 'nullable|string|max:500'
        ], [
            'user_id.required' => 'El estudiante es obligatorio',
            'tipo.required' => 'Debes seleccionar el tipo de práctica',
            'tipo.in' => 'El tipo de práctica debe ser I o II',
            'lugar_practica_id.required' => 'Debes seleccionar un lugar de práctica',
            'horas_requeridas.required' => 'Las horas requeridas son obligatorias',
            'horas_requeridas.min' => 'Debe ser al menos 1 hora',
            'horas_requeridas.max' => 'No puede exceder 500 horas',
            'fecha_inicio.required' => 'La fecha de inicio es obligatoria',
            'fecha_inicio.date' => 'La fecha de inicio debe ser válida'
        ]);

        // Verificar que no exista ya una práctica del mismo tipo
        $practicaExistente = Practica::where('user_id', $request->user_id)
            ->where('tipo', $request->tipo)
            ->first();

        if ($practicaExistente) {
            return redirect()->back()
                ->with('error', 'Este estudiante ya tiene una Práctica ' . $request->tipo . ' asignada.')
                ->withInput();
        }

        // Si es Práctica II, verificar que Práctica I esté aprobada
        if ($request->tipo === 'II') {
            $practicaI = Practica::where('user_id', $request->user_id)
                ->where('tipo', 'I')
                ->where('estado', 'aprobada')
                ->first();

            if (!$practicaI) {
                return redirect()->back()
                    ->with('error', 'El estudiante debe completar y aprobar la Práctica I primero.')
                    ->withInput();
            }
        }

        // Crear la práctica
        $practica = Practica::create([
            'user_id' => $validated['user_id'],
            'tipo' => $validated['tipo'],
            'lugar_practica_id' => $validated['lugar_practica_id'],
            'horas_requeridas' => $validated['horas_requeridas'],
            'fecha_inicio' => $validated['fecha_inicio'],
            'observaciones' => $validated['observaciones'],
            'estado' => 'asignada'
        ]);

        // Enviar email al estudiante
        $this->notificarAsignacion($practica);

        return redirect()->route('admin.estudiantes.index')
            ->with('success', '¡Práctica asignada exitosamente! El estudiante ha sido notificado por email.');
    }

    /**
     * Enviar email de asignación al estudiante
     */
    private function notificarAsignacion(Practica $practica)
    {
        try {
            $practica->load(['estudiante', 'lugarPractica']);
            
            Mail::send('emails.practica-asignada', ['practica' => $practica], function ($message) use ($practica) {
                $message->to($practica->estudiante->email)
                    ->subject('📋 Nueva Práctica Asignada - Sistema de Certificados');
            });
        } catch (\Exception $e) {
            \Log::error('Error enviando email de asignación: ' . $e->getMessage());
        }
    }
}