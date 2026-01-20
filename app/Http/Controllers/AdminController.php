<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Practica;
use App\Models\LugarPractica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Carrera;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;



class AdminController extends Controller
{
    /**
     * Dashboard con listado de estudiantes
     */
    /**
 * Dashboard con listado de estudiantes
 */
    public function dashboard(Request $request)
    {
        $search = $request->get('search');
        
        $estudiantes = User::where('rol', 'estudiante')
            ->when($search, function ($query, $search) {
                return $query->where(function($q) use ($search) {
                    $q->where('cedula', 'like', "%{$search}%")
                    ->orWhere('nombres', 'like', "%{$search}%")
                    ->orWhere('apellidos', 'like', "%{$search}%")
                    ->orWhereRaw("CONCAT(nombres, ' ', apellidos) LIKE ?", ["%{$search}%"]);
                });
            })
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
        $practicaRechazada = $estudiante->practicas
        ->where('estado', 'rechazada')
        ->sortByDesc('updated_at')
        ->first();
        
        // Obtener lugares activos
        $lugaresPractica = LugarPractica::where('activo', true)->get();

        // 🆕 Obtener años lectivos para el combobox
        $aniosLectivos = Practica::obtenerAniosLectivos();
        
        // 🆕 Obtener año lectivo actual como valor por defecto
        $anioLectivoActual = Practica::obtenerAnioLectivoActual();

        return view('admin.estudiantes.asignar', compact(
            'estudiante', 
            'practicaI', 
            'practicaII', 
            'lugaresPractica',
            'aniosLectivos',      // 🆕
            'anioLectivoActual',
            'practicaRechazada'    // 🆕
        ));
    }

    /**
     * Guardar asignación de práctica
     */
    public function guardarPractica(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'anio_lectivo' => 'required|regex:/^\d{4}-[12]$/',
            'tipo' => 'required|in:I,II',
            'lugar_practica_id' => 'required|exists:lugares_practica,id',
            'horas_requeridas' => 'required|integer|min:1|max:500',
            'fecha_inicio' => 'required|date',
            'observaciones' => 'nullable|string|max:500'
        ], [
            'user_id.required' => 'El estudiante es obligatorio',
            'anio_lectivo.required' => 'El año lectivo es obligatorio',
            'anio_lectivo.regex' => 'El formato del año lectivo no es válido',
            'tipo.required' => 'Debes seleccionar el tipo de práctica',
            'tipo.in' => 'El tipo de práctica debe ser I o II',
            'lugar_practica_id.required' => 'Debes seleccionar un lugar de práctica',
            'horas_requeridas.required' => 'Las horas requeridas son obligatorias',
            'horas_requeridas.min' => 'Debe ser al menos 1 hora',
            'horas_requeridas.max' => 'No puede exceder 500 horas',
            'fecha_inicio.required' => 'La fecha de inicio es obligatoria',
            'fecha_inicio.date' => 'La fecha de inicio debe ser válida'
        ]);

        \Log::info('=== INICIO ASIGNACIÓN DE PRÁCTICA ===');
        \Log::info('Datos validados:', $validated);

        // 🆕 PRIMERO: Verificar si existe una práctica RECHAZADA del mismo tipo
        $practicaRechazada = Practica::where('user_id', $request->user_id)
            ->where('tipo', $request->tipo)
            ->where('estado', 'rechazada')
            ->first();

        if ($practicaRechazada) {
            // 🔄 REASIGNAR: Actualizar la práctica rechazada (resetear a estado inicial)
            \Log::info('🔄 Reasignando práctica rechazada ID: ' . $practicaRechazada->id);
            
            $practicaRechazada->update([
                'anio_lectivo' => $validated['anio_lectivo'],
                'lugar_practica_id' => $validated['lugar_practica_id'],
                'horas_requeridas' => $validated['horas_requeridas'],
                'fecha_inicio' => $validated['fecha_inicio'],
                'observaciones' => $validated['observaciones'],
                'estado' => 'asignada', // ✅ Vuelve a estado inicial
                'archivo_url' => null, // ✅ Limpia el archivo anterior
                'fecha_finalizacion' => null, // ✅ Limpia la fecha
            ]);

            $practica = $practicaRechazada;
            $mensaje = '¡Práctica reasignada exitosamente!';
            
        } else {
            // Verificar que NO exista ya una práctica asignada/aprobada/pendiente del mismo tipo
            $practicaExistente = Practica::where('user_id', $request->user_id)
                ->where('tipo', $request->tipo)
                ->whereIn('estado', ['asignada', 'pendiente_revision', 'aprobada'])
                ->first();

            if ($practicaExistente) {
                return redirect()->back()
                    ->with('error', 'Este estudiante ya tiene una Práctica ' . $request->tipo . ' en proceso.')
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

            // ✨ CREAR NUEVA: Crear la práctica desde cero
            \Log::info('✨ Creando nueva práctica');
            
            $practica = Practica::create([
                'user_id' => $validated['user_id'],
                'anio_lectivo' => $validated['anio_lectivo'],
                'tipo' => $validated['tipo'],
                'lugar_practica_id' => $validated['lugar_practica_id'],
                'horas_requeridas' => $validated['horas_requeridas'],
                'fecha_inicio' => $validated['fecha_inicio'],
                'observaciones' => $validated['observaciones'],
                'estado' => 'asignada'
            ]);

            $mensaje = '¡Práctica asignada exitosamente!';
        }

        \Log::info('Práctica procesada con ID: ' . $practica->id);

        // Cargar relaciones
        $practica->load(['estudiante', 'lugarPractica']);

        \Log::info('Email del estudiante: ' . ($practica->estudiante->email ?? 'NO TIENE EMAIL'));
        \Log::info('Nombre del estudiante: ' . $practica->estudiante->nombres . ' ' . $practica->estudiante->apellidos);

        // Enviar email al estudiante
        \Log::info('Intentando enviar email...');
        $this->notificarAsignacion($practica);
        \Log::info('Método notificarAsignacion ejecutado');

        return redirect()->route('admin.estudiantes.index')
            ->with('success', $mensaje . ' El estudiante ha sido notificado por email.');
    }

    /**
     * Enviar email de asignación al estudiante
     */
    private function notificarAsignacion(Practica $practica)
    {
        \Log::info('=== DENTRO DE notificarAsignacion ===');
        
        try {
            // Ya debería tener las relaciones cargadas desde guardarPractica
            
            \Log::info('Preparando email para: ' . $practica->estudiante->email);
            \Log::info('Lugar de práctica: ' . $practica->lugarPractica->nombre);
            
            Mail::send('emails.practica-asignada', ['practica' => $practica], function ($message) use ($practica) {
                $message->to($practica->estudiante->email)
                    ->subject('📋 Nueva Práctica Asignada - Sistema de Certificados');
            });
            
            \Log::info('✅ Email enviado correctamente');
            
        } catch (\Exception $e) {
            \Log::error('❌ ERROR enviando email: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
        }
    }



    public function indexEstudiantes(Request $request)
{
    $search = $request->get('search');
    
    $estudiantes = User::where('rol', 'estudiante')
        ->when($search, function ($query, $search) {
            return $query->where(function($q) use ($search) {
                $q->where('nombres', 'like', "%{$search}%")
                  ->orWhere('apellidos', 'like', "%{$search}%")
                  ->orWhere('cedula', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        })
        ->with('carrera')
        ->paginate(15);
    
    return view('admin.estudiantes.index', compact('estudiantes'));
}

public function editEstudiante($id)
{
    $estudiante = User::where('rol', 'estudiante')->findOrFail($id);
    $carreras = Carrera::all();
    
    return view('admin.estudiantes.edit', compact('estudiante', 'carreras'));
}

public function updateEstudiante(Request $request, $id)
{
    $estudiante = User::where('rol', 'estudiante')->findOrFail($id);
    
    $request->validate([
        'cedula' => 'required|string|max:10|unique:users,cedula,' . $id,
        'email' => 'required|email|unique:users,email,' . $id,
        'nombres' => 'required|string|max:255',
        'apellidos' => 'required|string|max:255',
        'carrera_id' => 'required|exists:carreras,id',
        'nivel' => 'required|integer|min:1|max:10',
    ]);
    
    $estudiante->update($request->all());
    
    return redirect()->route('admin.estudiantes.index')
        ->with('success', 'Estudiante actualizado correctamente');
}

public function destroyEstudiante($id)
{
    $estudiante = User::where('rol', 'estudiante')->findOrFail($id);
    $estudiante->delete();
    
    return redirect()->route('admin.estudiantes.index')
        ->with('success', 'Estudiante eliminado correctamente');
}
public function rechazarPractica($id)
{
    $practica = Practica::findOrFail($id);

    $practica->estado = 'rechazada';
    $practica->save();

    return redirect()->route('admin.estudiantes.index')
        ->with('success', 'Práctica rechazada. Ahora puedes reasignar.');
}


}