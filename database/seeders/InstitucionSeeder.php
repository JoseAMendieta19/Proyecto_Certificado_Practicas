<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Institucion;

class InstitucionSeeder extends Seeder
{
    public function run(): void
    {
        $instituciones = [
            'ULEAM - MATRIZ MANTA',
            'ULEAM - EXTENSIÓN CHONE',
            'ULEAM - EXTENSIÓN SUCRE',
            'ULEAM - EXTENSIÓN EL CARMEN',
            'ULEAM - EXTENSIÓN PEDERNALES',
            'ULEAM - CAMPUS PICHINCHA',
            'ULEAM - EXTENSIÓN FLAVIO ALFARO',
            'ULEAM - SEDE SANTO DOMINGO',
            'ULEAM - CAMPUS TOSAGUA',
            'ULEAM - SANTA ANA',
            'ULEAM - JUNÍN',
            'ULEAM - SAN ISIDRO',
            'ULEAM - PUERTO LÓPEZ',
        ];

        foreach ($instituciones as $nombre) {
            Institucion::firstOrCreate(
                ['nombre' => $nombre],
                ['created_at' => now(), 'updated_at' => now()]
            );
        }
    }
}
