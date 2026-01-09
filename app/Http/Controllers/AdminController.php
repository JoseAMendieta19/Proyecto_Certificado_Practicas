<?php

namespace App\Http\Controllers;

use App\Models\Practica;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Traer solo estudiantes
        $estudiantes = User::where('rol', 'estudiante')
        ->with('practicas')
        ->get();

        return view('dashboard_admin', compact('estudiantes'));

    }

    public function asignarPracticaForm($id)
    {
        $estudiante = User::findOrFail($id);

        return view('admin.asignar_practica', compact('estudiante'));
    }

    public function guardarPractica(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'tipo' => 'required|in:I,II',
            'lugar_practica' => 'required|string',
            'horas_requeridas' => 'required|integer|min:1'
        ]);

        Practica::create([
            'user_id' => $request->user_id,
            'tipo' => $request->tipo,
            'lugar_practica' => $request->lugar_practica,
            'horas_requeridas' => $request->horas_requeridas,
            'estado' => 'asignada'
        ]);

        return redirect()->route('admin.dashboard')
            ->with('success', 'Práctica asignada correctamente');

        $existe = Practica::where('user_id', $request->user_id)
            ->where('tipo', $request->tipo)
            ->exists();

        if ($existe) {
            return redirect()->back()
                ->withErrors('Este estudiante ya tiene asignada esta práctica.');
        }
    }

}
