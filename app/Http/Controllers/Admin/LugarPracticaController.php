<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LugarPractica;
use Illuminate\Http\Request;

class LugarPracticaController extends Controller
{
    /**
     * Mostrar listado de lugares
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        
        $lugares = LugarPractica::query()
            ->when($search, function ($query, $search) {
                return $query->where(function($q) use ($search) {
                    $q->where('nombre', 'like', "%{$search}%")
                      ->orWhere('direccion', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->get();
            
        return view('admin.lugares.index', compact('lugares'));
    }

    /**
     * Mostrar formulario de creación
     */
    public function create()
    {
        return view('admin.lugares.create');
    }

    /**
     * Guardar nuevo lugar
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'activo' => 'boolean'
        ]);

        LugarPractica::create($validated);

        return redirect()->route('admin.lugares.index')
            ->with('success', 'Lugar de práctica creado exitosamente.');
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit(LugarPractica $lugar)
    {
        return view('admin.lugares.edit', compact('lugar'));
    }

    /**
     * Actualizar lugar existente
     */
    public function update(Request $request, LugarPractica $lugar)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'activo' => 'boolean'
        ]);

        $lugar->update($validated);

        return redirect()->route('admin.lugares.index')
            ->with('success', 'Lugar de práctica actualizado exitosamente.');
    }

    /**
     * Eliminar lugar
     */
    public function destroy(LugarPractica $lugar)
    {
        // Verificar si tiene prácticas asociadas
        if ($lugar->practicas()->count() > 0) {
            return redirect()->route('admin.lugares.index')
                ->with('error', 'No se puede eliminar este lugar porque tiene prácticas asociadas.');
        }

        $lugar->delete();

        return redirect()->route('admin.lugares.index')
            ->with('success', 'Lugar de práctica eliminado exitosamente.');
    }
}