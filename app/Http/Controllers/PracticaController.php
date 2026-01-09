<?php

namespace App\Http\Controllers;

use App\Models\Practica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PracticaController extends Controller
{
    // ===============================
    // ADMIN ASIGNA PRÁCTICA
    // ===============================
    public function store(Request $request)
    {
        // 1. Verificar si el estudiante ya tiene una práctica activa
        $practicaActiva = Practica::where('user_id', $request->user_id)
            ->whereIn('estado', ['asignada', 'pendiente_revision'])
            ->first();

        if ($practicaActiva) {
            return back()->withErrors(
                'El estudiante ya tiene una práctica activa.'
            );
        }

        // 📘 Regla: no se puede asignar Práctica II sin aprobar Práctica I
        if ($request->tipo === 'II') {
            $practicaI = Practica::where('user_id', $request->user_id)
                ->where('tipo', 'I')
                ->where('estado', 'aprobada')
                ->first();

            if (!$practicaI) {
                return back()->withErrors(
                    'No se puede asignar Práctica II sin aprobar Práctica I.'
                );
            }
        }

        // 2. Crear práctica
        Practica::create([
            'user_id' => $request->user_id,
            'tipo' => $request->tipo, // I o II
            'lugar_practica' => $request->lugar_practica,
            'horas_requeridas' => $request->horas_requeridas,
            'estado' => 'asignada',
        ]);

        return back()->with('success', 'Práctica asignada correctamente.');
    }

    // ===============================
    // ESTUDIANTE SUBE DOCUMENTO
    // ===============================
    public function subirDocumento(Request $request, $id)
    {
        $practica = Practica::findOrFail($id);

        // 🔐 Validar que la práctica sea del estudiante
        if ($practica->user_id !== auth()->id()) {
            abort(403);
        }

        // 🚦 Validar estado permitido
        if (!in_array($practica->estado, ['asignada', 'rechazada'])) {
            return back()->with('error', 'No puedes subir documentos en este estado.');
        }

        // 📄 Validar archivo
        $request->validate([
            'documento' => 'required|file|mimes:pdf,doc,docx|max:2048'
        ]);

        // 💾 Guardar archivo
        $ruta = $request->file('documento')->store('practicas', 'public');

        // 🔄 Actualizar práctica
        $practica->update([
            'archivo_url' => $ruta,
            'estado' => 'pendiente_revision'
        ]);

        return back()->with('success', 'Documento enviado para revisión.');
    }


    // ===============================
    // ADMIN APRUEBA PRÁCTICA
    // ===============================
    public function aprobar(Practica $practica)
    {
        $practica->update([
            'estado' => 'aprobada'
        ]);

        return redirect()
            ->route('admin.dashboard')
            ->with('success', 'Práctica aprobada correctamente.');
    }

    // ===============================
    // ADMIN RECHAZA PRÁCTICA
    // ===============================
    public function rechazar(Practica $practica)
    {
        if ($practica->archivo_url &&
            Storage::disk('public')->exists($practica->archivo_url)) {

            Storage::disk('public')->delete($practica->archivo_url);
        }

        $practica->update([
            'estado' => 'rechazada',
            'archivo_url' => null
        ]);

        return redirect()
            ->route('admin.dashboard')
            ->with('error', 'Práctica rechazada.');
    }


    public function revisar(Practica $practica)
    {
        return view('admin.revisar_practica', compact('practica'));
    }

    public function dashboardEstudiante()
    {
        $user = auth()->user();

        $practicas = \App\Models\Practica::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard_estudiante', compact('practicas'));
    }


}
