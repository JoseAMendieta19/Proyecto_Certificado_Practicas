<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Practica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

class ValidacionController extends Controller
{
    /**
     * Mostrar listado de prácticas pendientes de revisión
     */
    public function index()
    {
        $practicasPendientes = Practica::with(['estudiante', 'lugarPractica'])
            ->where('estado', 'pendiente_revision')
            ->latest()
            ->get();

        return view('admin.validaciones.index', compact('practicasPendientes'));
    }

    /**
     * Mostrar detalle para revisar una práctica específica
     */
    public function revisar(Practica $practica)
    {
        // Verificar que esté pendiente de revisión
        if ($practica->estado !== 'pendiente_revision') {
            return redirect()->route('admin.validaciones.index')
                ->with('error', 'Esta práctica no está pendiente de revisión.');
        }

        $practica->load(['estudiante', 'lugarPractica']);
        
        return view('admin.validaciones.revisar', compact('practica'));
    }

    /**
     * Aprobar una práctica
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
     * Rechazar una práctica
     */
    public function rechazar(Request $request, Practica $practica)
    {
        $request->validate([
            'observaciones' => 'required|string|max:500'
        ]);

        $practica->update([
            'estado' => 'rechazada',
            'observaciones' => $request->observaciones
        ]);

        // Enviar email al estudiante
        $this->enviarNotificacionRechazo($practica);

        return redirect()->route('admin.validaciones.index')
            ->with('success', 'Práctica rechazada. El estudiante ha sido notificado por email.');
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
}