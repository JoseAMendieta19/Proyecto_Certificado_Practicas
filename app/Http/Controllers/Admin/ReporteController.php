<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Practica;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EstudiantesExport;

class ReporteController extends Controller
{
    /**
     * Mostrar página de reportes
     */
    public function index()
    {
        $estadisticas = [
            'total_estudiantes' => User::where('rol', 'estudiante')->count(),
            'practicas_asignadas' => Practica::where('estado', 'asignada')->count(),
            'practicas_pendientes' => Practica::where('estado', 'pendiente_revision')->count(),
            'practicas_aprobadas' => Practica::where('estado', 'aprobada')->count(),
            'practicas_rechazadas' => Practica::where('estado', 'rechazada')->count(),
        ];

        return view('admin.reportes.index', compact('estadisticas'));
    }

    /**
     * Descargar reporte en Excel o PDF
     */
    public function descargar(Request $request)
    {
        $formato = $request->get('formato', 'excel'); // excel o pdf
        $estado = $request->get('estado'); // filtro opcional

        $estudiantes = User::where('rol', 'estudiante')
            ->with(['practicas' => function($query) use ($estado) {
                if ($estado) {
                    $query->where('estado', $estado);
                }
            }, 'institucion', 'carrera'])
            ->get();

        if ($formato === 'pdf') {
            return $this->generarPDF($estudiantes, $estado);
        }

        return $this->generarExcel($estudiantes, $estado);
    }

    /**
     * Generar reporte en Excel
     */
    private function generarExcel($estudiantes, $estado)
    {
        $data = [];
        
        foreach ($estudiantes as $estudiante) {
            foreach ($estudiante->practicas as $practica) {
                $data[] = [
                    'Cédula' => $estudiante->cedula ?? 'N/A',
                    'Nombres' => $estudiante->nombres,
                    'Apellidos' => $estudiante->apellidos,
                    'Email' => $estudiante->email,
                    'Institución' => $estudiante->institucion->nombre ?? 'N/A',
                    'Carrera' => $estudiante->carrera->nombre ?? 'N/A',
                    'Tipo Práctica' => 'Práctica ' . $practica->tipo,
                    'Lugar' => $practica->lugarPractica->nombre ?? 'N/A',
                    'Horas' => $practica->horas_requeridas,
                    'Fecha Inicio' => $practica->fecha_inicio ? $practica->fecha_inicio->format('d/m/Y') : 'N/A',
                    'Fecha Fin' => $practica->fecha_finalizacion ? $practica->fecha_finalizacion->format('d/m/Y') : 'N/A',
                    'Estado' => ucfirst(str_replace('_', ' ', $practica->estado)),
                    'Observaciones' => $practica->observaciones ?? '',
                ];
            }
        }

        // Crear archivo Excel
        $filename = 'reporte_practicas_' . now()->format('Y-m-d_His') . '.xlsx';
        
        return Excel::download(new class($data) implements \Maatwebsite\Excel\Concerns\FromArray, \Maatwebsite\Excel\Concerns\WithHeadings {
            protected $data;

            public function __construct($data)
            {
                $this->data = $data;
            }

            public function array(): array
            {
                return $this->data;
            }

            public function headings(): array
            {
                return array_keys($this->data[0] ?? []);
            }
        }, $filename);
    }

    /**
     * Generar reporte en PDF
     */
    private function generarPDF($estudiantes, $estado)
    {
        $pdf = Pdf::loadView('admin.reportes.pdf', [
            'estudiantes' => $estudiantes,
            'estado' => $estado,
            'fecha_generacion' => now()->format('d/m/Y H:i')
        ]);

        $filename = 'reporte_practicas_' . now()->format('Y-m-d_His') . '.pdf';
        
        return $pdf->download($filename);
    }
}