<?php

namespace App\Http\Controllers;

use App\Models\Practica;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class CertificadoController extends Controller
{
    /**
     * Generar y descargar certificado oficial (Práctica I o II individual)
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
     * Vista previa del certificado individual
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

    /**
     * Descargar certificado final (ambas prácticas completadas)
     */
    public function descargarFinal()
    {
        $estudiante = Auth::user();
        
        // Obtener ambas prácticas aprobadas
        $practicaI = $estudiante->practicas()
            ->where('tipo', 'I')
            ->where('estado', 'aprobada')
            ->first();
            
        $practicaII = $estudiante->practicas()
            ->where('tipo', 'II')
            ->where('estado', 'aprobada')
            ->first();

        // Verificar que ambas prácticas estén aprobadas
        if (!$practicaI || !$practicaII) {
            return redirect()->back()
                ->with('error', 'Debes completar y aprobar ambas prácticas (I y II) para generar el certificado final.');
        }

        // Cargar relaciones necesarias
        $estudiante->load(['carrera', 'institucion']);
        $practicaI->load('lugarPractica');
        $practicaII->load('lugarPractica');

        // Calcular total de horas
        $totalHoras = $practicaI->horas_requeridas + $practicaII->horas_requeridas;

        // Generar PDF usando la nueva vista final
        $pdf = PDF::loadView('admin.certificados.final', [
            'estudiante' => $estudiante,
            'practicaI' => $practicaI,
            'practicaII' => $practicaII,
            'totalHoras' => $totalHoras
        ]);

        // Configurar orientación horizontal y tamaño carta
        $pdf->setPaper('letter', 'landscape')
            ->setOption('isRemoteEnabled', true)
            ->setOption('isHtml5ParserEnabled', true);

        // Nombre del archivo
        $nombreArchivo = 'Certificado_Final_Practicas_' . 
                        $estudiante->nombres . '_' . 
                        $estudiante->apellidos . '_' .
                        now()->format('Y') . '.pdf';

        return $pdf->download($nombreArchivo);
    }

    /**
     * Ver certificado final en el navegador (vista previa)
     */
    public function vistaFinal()
    {
        $estudiante = Auth::user();
        
        // Obtener ambas prácticas aprobadas
        $practicaI = $estudiante->practicas()
            ->where('tipo', 'I')
            ->where('estado', 'aprobada')
            ->first();
            
        $practicaII = $estudiante->practicas()
            ->where('tipo', 'II')
            ->where('estado', 'aprobada')
            ->first();

        // Verificar que ambas prácticas estén aprobadas
        if (!$practicaI || !$practicaII) {
            return redirect()->back()
                ->with('error', 'Debes completar y aprobar ambas prácticas (I y II) para ver el certificado final.');
        }

        // Cargar relaciones necesarias
        $estudiante->load(['carrera', 'institucion']);
        $practicaI->load('lugarPractica');
        $practicaII->load('lugarPractica');

        // Calcular total de horas
        $totalHoras = $practicaI->horas_requeridas + $practicaII->horas_requeridas;

        // Generar PDF y mostrarlo en el navegador
        $pdf = PDF::loadView('admin.certificados.final', [
            'estudiante' => $estudiante,
            'practicaI' => $practicaI,
            'practicaII' => $practicaII,
            'totalHoras' => $totalHoras
        ]);

        // Configurar orientación horizontal y tamaño carta
        $pdf->setPaper('letter', 'landscape')
            ->setOption('isRemoteEnabled', true)
            ->setOption('isHtml5ParserEnabled', true);

        return $pdf->stream('Certificado_Final_Practicas_Profesionales.pdf');
    }

    /**
     * Alias para vistaFinal() - mantener compatibilidad
     */
    public function verFinal()
    {
        return $this->vistaFinal();
    }
}