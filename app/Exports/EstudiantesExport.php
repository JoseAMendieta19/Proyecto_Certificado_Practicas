<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EstudiantesExport implements FromArray, WithHeadings
{
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
        return [
            'Cédula',
            'Nombres',
            'Apellidos',
            'Email',
            'Institución',
            'Carrera',
            'Tipo Práctica',
            'Lugar',
            'Horas',
            'Fecha Inicio',
            'Fecha Fin',
            'Estado',
            'Observaciones'
        ];
    }
}