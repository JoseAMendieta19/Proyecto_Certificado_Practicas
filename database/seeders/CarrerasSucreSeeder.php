<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Institucion;
use App\Models\Carrera;

class CarrerasSucreSeeder extends Seeder
{
    public function run(): void
    {
        $sucre = Institucion::where('nombre', 'ULEAM - EXTENSIÓN SUCRE')->first();

        if (!$sucre) {
            $this->command->error('Institución SUCRE no encontrada');
            return;
        }

        $carreras = [
            'ADMINISTRACIÓN DE EMPRESAS',
            'AGROPECUARIA',
            'DERECHO',
            'EDUCACIÓN BÁSICA',
            'EDUCACIÓN INICIAL',
            'FISIOTERAPIA',
            'ENFERMERÍA',
            'TURISMO SOSTENIBLE',
            'GASTRONOMÍA',
        ];

        foreach ($carreras as $nombre) {
            Carrera::firstOrCreate([
                'nombre' => $nombre,
                'institucion_id' => $sucre->id,
            ]);
        }

        $this->command->info('Carreras de SUCRE agregadas correctamente');
    }
}
