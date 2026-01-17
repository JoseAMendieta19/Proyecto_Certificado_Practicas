<?php

namespace App\Http\Controllers;

use App\Models\Practica;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CertificadoController extends Controller
{
    /**
     * Generar y descargar certificado oficial
     */
    public function descargar(Practica $practica)
    {
        // Verificar que la práctica pertenece al estudiante autenticado
        if ($practica->user_id !== auth()->id()) {
            abort(403, 'No tienes permiso para descargar este certificado.');
        }

        // Verificar que la práctica está aprobada
        if ($practica->estado !== 'aprobada') {
            return redirect()->route('estudiante.practicas')
                ->with('error', 'Solo puedes descargar certificados de prácticas aprobadas.');
        }

        // Cargar relaciones
        $practica->load(['estudiante.institucion', 'estudiante.carrera', 'lugarPractica']);

        // Generar PDF - Usar vista oficial
        $pdf = Pdf::loadView('admin.certificados.oficial', [
            'practica' => $practica,
            'estudiante' => $practica->estudiante,
            'fecha_emision' => now()->locale('es')->isoFormat('D [de] MMMM [de] YYYY')
        ]);

        // Configurar orientación horizontal y tamaño carta
        $pdf->setPaper('letter', 'landscape')
            ->setOption('isRemoteEnabled', true)
            ->setOption('isHtml5ParserEnabled', true);

        $filename = 'certificado_practica_' . $practica->tipo . '_' . $practica->estudiante->cedula . '.pdf';

        return $pdf->download($filename);
    }

    /**
     * Vista previa del certificado
     */
    public function vista(Practica $practica)
    {
        // Verificar que la práctica pertenece al estudiante autenticado
        if ($practica->user_id !== auth()->id()) {
            abort(403, 'No tienes permiso para ver este certificado.');
        }

        // Verificar que la práctica está aprobada
        if ($practica->estado !== 'aprobada') {
            return redirect()->route('estudiante.practicas')
                ->with('error', 'Solo puedes ver certificados de prácticas aprobadas.');
        }

        // Cargar relaciones
        $practica->load(['estudiante.institucion', 'estudiante.carrera', 'lugarPractica']);

        return view('admin.certificados.oficial', [
            'practica' => $practica,
            'estudiante' => $practica->estudiante,
            'fecha_emision' => now()->locale('es')->isoFormat('D [de] MMMM [de] YYYY'),
            'vista_previa' => true
        ]);
    }
}