<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\JsonResponse;

class InstitucionController extends Controller
{
    /**
     * Devuelve las carreras según la institución
     */
    public function carreras($institucionId): JsonResponse
    {
        $carreras = Carrera::where('institucion_id', $institucionId)
            ->orderBy('nombre')
            ->get(['id', 'nombre']);

        return response()->json($carreras);
    }
}
