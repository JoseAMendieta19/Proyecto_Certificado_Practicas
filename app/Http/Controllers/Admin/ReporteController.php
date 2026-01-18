<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Practica;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;


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
            ->when($estado, function ($query) use ($estado) {
                $query->whereHas('practicas', function ($q) use ($estado) {
                    $q->where('estado', $estado);
                });
            })
            ->with(['practicas' => function ($query) use ($estado) {
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
        $rows = [];

        foreach ($estudiantes as $estudiante) {

            // 👉 CASO 1: NO tiene prácticas
            if ($estudiante->practicas->isEmpty()) {

                // Solo mostrar si el filtro es "Todos"
                if (!$estado) {
                    $rows[] = [
                        $estudiante->cedula ?? 'N/A',
                        $estudiante->nombres,
                        $estudiante->apellidos,
                        $estudiante->email,
                        $estudiante->institucion->nombre ?? 'N/A',
                        $estudiante->carrera->nombre ?? 'N/A',
                        'N/A',
                        'Sin prácticas',
                        'N/A',
                        '0',
                        'N/A',
                        'N/A',
                        'Sin prácticas asignadas',
                        '',
                    ];
                }

                continue;
            }

            // 👉 CASO 2: TIENE prácticas
            foreach ($estudiante->practicas as $practica) {
                $rows[] = [
                    $estudiante->cedula ?? 'N/A',
                    $estudiante->nombres,
                    $estudiante->apellidos,
                    $estudiante->email,
                    $estudiante->institucion->nombre ?? 'N/A',
                    $estudiante->carrera->nombre ?? 'N/A',
                    $practica->anio_lectivo ?? 'N/A',  
                    'Práctica ' . $practica->tipo,
                    $practica->lugarPractica->nombre ?? 'N/A',
                    $practica->horas_requeridas,
                    $practica->fecha_inicio?->format('d/m/Y') ?? 'N/A',
                    $practica->fecha_finalizacion?->format('d/m/Y') ?? 'N/A',
                    ucfirst(str_replace('_', ' ', $practica->estado)),
                    $practica->observaciones ?? '',
                ];
            }
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Encabezados
        $sheet->fromArray([
            [
                'Cédula', 'Nombres', 'Apellidos', 'Email', 'Institución', 'Carrera',
                'Periodo', 'Tipo Práctica', 'Lugar', 'Horas', 'Fecha Inicio', 'Fecha Fin',
                'Estado', 'Observaciones'
            ]
        ], null, 'A1');

        // Datos
        $sheet->fromArray($rows, null, 'A2');

        // Ajustar ancho automático
        foreach (range('A', $sheet->getHighestColumn()) as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'reporte_practicas_' . now()->format('Y-m-d_His') . '.xlsx';

        return new StreamedResponse(function () use ($writer) {
            $writer->save('php://output');
        }, 200, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => 'attachment;filename="' . $filename . '"',
        ]);
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