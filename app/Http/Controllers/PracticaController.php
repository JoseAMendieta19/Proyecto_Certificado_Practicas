<?php

namespace App\Http\Controllers;

use App\Models\Practica;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PracticaController extends Controller
{
    /**
     * Dashboard del estudiante
     */
    public function dashboardEstudiante()
{
    $estudiante = auth()->user();
    $practicas = $estudiante->practicas()->with('lugarPractica')->get();
    
    // ESTA ES TU VISTA CORRECTA
    return view('dashboard_estudiante', compact('practicas'));
}

    /**
     * Subir documento de validación
     */
    public function subirDocumento(Request $request, $id)
    {
        $request->validate([
            'archivo' => 'required|file|mimes:pdf|max:5120', // Max 5MB
            'fecha_finalizacion' => 'required|date|before_or_equal:today'
        ], [
            'archivo.required' => 'Debes seleccionar un archivo PDF',
            'archivo.mimes' => 'El archivo debe ser formato PDF',
            'archivo.max' => 'El archivo no puede pesar más de 5MB',
            'fecha_finalizacion.required' => 'La fecha de finalización es obligatoria',
            'fecha_finalizacion.before_or_equal' => 'La fecha no puede ser futura',
            'fecha_inicio' => ['required','date','after_or_equal:' . Carbon::today()->addDays(2)->toDateString(),],
        ]);

        $practica = Practica::findOrFail($id);

        // Verificar que la práctica pertenece al estudiante
        if ($practica->user_id !== auth()->id()) {
            return redirect()->route('estudiante.dashboard')
                ->with('error', 'No tienes permiso para modificar esta práctica.');
        }

        // Verificar que está en estado "asignada"
        if ($practica->estado !== 'asignada') {
            return redirect()->route('estudiante.dashboard')
                ->with('error', 'Esta práctica ya no puede ser modificada.');
        }

        // Eliminar archivo anterior si existe
        if ($practica->archivo_url) {
            Storage::delete($practica->archivo_url);
        }

        // Guardar el nuevo archivo
        $archivo = $request->file('archivo');
        $nombreArchivo = 'practica_' . $practica->id . '_' . time() . '.pdf';
        $path = $archivo->storeAs('practicas', $nombreArchivo, 'public');

        // Actualizar la práctica
        $practica->update([
            'archivo_url' => $path,
            'fecha_finalizacion' => $request->fecha_finalizacion,
            'estado' => 'pendiente_revision'
        ]);

        // Enviar notificación al administrador
        $this->notificarAdministrador($practica);

        return redirect()->route('estudiante.dashboard')
            ->with('success', '¡Documento subido exitosamente! El administrador revisará tu práctica pronto.');
    }

    /**
     * Revisar práctica (Admin)
     */
    public function revisar(Practica $practica)
    {
        $practica->load(['estudiante', 'lugarPractica']);
        return view('admin.validaciones.revisar', compact('practica'));
    }

    /**
     * Aprobar práctica (Admin)
     */
    public function aprobar(Request $request, Practica $practica)
    {
        $request->validate([
            'observaciones' => 'nullable|string|max:500'
        ]);

        $practica->update([
            'estado' => 'aprobada',
            'observaciones' => $request->observaciones ?? 'Práctica aprobada correctamente.'
        ]);

        // Enviar email al estudiante
        $this->enviarNotificacionAprobacion($practica);

        return redirect()->route('admin.validaciones.index')
            ->with('success', '¡Práctica aprobada! El estudiante ha sido notificado por email.');
    }

    /**
     * Rechazar práctica (Admin)
     */
    public function rechazar(Request $request, Practica $practica)
    {
        $request->validate([
            'observaciones' => 'required|string|max:500'
        ]);

        $practica->update([
            'estado' => 'rechazada',
            'observaciones' => $request->observaciones,
            'archivo_url' => null // Eliminar el archivo rechazado
        ]);

        // Eliminar archivo físico
        if ($practica->archivo_url) {
            Storage::delete($practica->archivo_url);
        }

        // Enviar email al estudiante
        $this->enviarNotificacionRechazo($practica);

        return redirect()->route('admin.validaciones.index')
            ->with('success', 'Práctica rechazada. El estudiante ha sido notificado por email.');
    }

    /**
     * Notificar al administrador sobre nuevo documento
     */
    private function notificarAdministrador(Practica $practica)
    {
        try {
            $admin = User::where('rol', 'admin')->first();
            
            if ($admin && $admin->email) {
                Mail::send('emails.nueva-revision', ['practica' => $practica], function ($message) use ($admin) {
                    $message->to($admin->email)
                        ->subject('📋 Nuevo documento para revisar - Sistema de Prácticas');
                });
            }
        } catch (\Exception $e) {
            \Log::error('Error enviando email al admin: ' . $e->getMessage());
        }
    }

    /**
     * Enviar email de aprobación
     */
    private function enviarNotificacionAprobacion(Practica $practica)
    {
        try {
            Mail::send('emails.practica-aprobada', ['practica' => $practica], function ($message) use ($practica) {
                $message->to($practica->estudiante->email)
                    ->subject('✅ Práctica Aprobada - Sistema de Certificados');
            });
        } catch (\Exception $e) {
            \Log::error('Error enviando email de aprobación: ' . $e->getMessage());
        }
    }

    /**
     * Enviar email de rechazo
     */
    private function enviarNotificacionRechazo(Practica $practica)
    {
        try {
            Mail::send('emails.practica-rechazada', ['practica' => $practica], function ($message) use ($practica) {
                $message->to($practica->estudiante->email)
                    ->subject('❌ Práctica Rechazada - Sistema de Certificados');
            });
        } catch (\Exception $e) {
            \Log::error('Error enviando email de rechazo: ' . $e->getMessage());
        }
    }



    public function editarPerfil()
{
    return view('profile.student-edit', [  // Cambia 'profile.edit' por 'profile.student-edit'
        'user' => Auth::user()
    ]);
}


public function home()
{
    $estudiante = Auth::user();
    
    // Estadísticas
    $totalPracticas = $estudiante->practicas->count();
    $practicasAprobadas = $estudiante->practicas->where('estado', 'aprobada')->count();
    $practicasPendientes = $estudiante->practicas->where('estado', 'pendiente_revision')->count();
    $practicasAsignadas = $estudiante->practicas->where('estado', 'asignada')->count();
    
    // Actividad reciente (últimas 5 prácticas)
    $actividadReciente = $estudiante->practicas()
        ->orderBy('updated_at', 'desc')
        ->take(5)
        ->get();
    
    // MANTENER TU RUTA ORIGINAL
    return view('admin.estudiantes.home', compact(
        'totalPracticas',
        'practicasAprobadas',
        'practicasPendientes',
        'practicasAsignadas',
        'actividadReciente'
    ));
}

}
