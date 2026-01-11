<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Institucion;
use App\Models\Carrera;

class CarreraSeeder extends Seeder
{
    public function run(): void
    {
        $matriz = Institucion::where('nombre', 'ULEAM - MATRIZ MANTA')->first();
        $chone  = Institucion::where('nombre', 'ULEAM - EXTENSIÓN CHONE')->first();
        $sucre = Institucion::where('nombre', 'ULEAM - EXTENSIÓN SUCRE')->first();
        $elCarmen = Institucion::where('nombre', 'ULEAM - EXTENSIÓN EL CARMEN')->first();
        $pedernales = Institucion::where('nombre', 'ULEAM - EXTENSIÓN PEDERNALES')->first();
        $pichincha = Institucion::where('nombre', 'ULEAM - CAMPUS PICHINCHA')->first();
        $flavioAlfaro = Institucion::where('nombre', 'ULEAM - EXTENSIÓN FLAVIO ALFARO')->first();
        $santoDomingo = Institucion::where('nombre', 'ULEAM - SEDE SANTO DOMINGO')->first();
        $tosagua = Institucion::where('nombre', 'ULEAM - CAMPUS TOSAGUA')->first();
        $santaAna = Institucion::where('nombre', 'ULEAM - SANTA ANA')->first();
        $junin = Institucion::where('nombre', 'ULEAM - JUNÍN')->first();
        $sanIsidro = Institucion::where('nombre', 'ULEAM - SAN ISIDRO')->first();
        $puertoLopez = Institucion::where('nombre', 'ULEAM - PUERTO LÓPEZ')->first();

        Carrera::insert([
            // MATRIZ
            [
                'nombre' => 'ENFERMERÍA',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'FISIOTERAPIA',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'LABORATORIO CLÍNICO',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'MEDICINA',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'NUTRICIÓN Y DIETÉTICA',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'ODONTOLOGÍA',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'PSICOLOGÍA',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'TERAPIA OCUPACIONAL',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'ADMINISTRACIÓN DE EMPRESAS',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'AUDITORÍA Y CONTROL DE GESTIÓN',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'COMERCIO EXTERIOR',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'CONTABILIDAD Y AUDITORÍA',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'GESTIÓN DE TALENTO HUMANO',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'GESTIÓN DE LA INFORMACIÓN GERENCIAL',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'FINANZAS',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'MARKETING',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'EDUCACIÓN INICIAL',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'EDUCACIÓN BÁSICA',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'EDUCACIÓN BÁSICA BILINGÜE',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'EDUCACIÓN INCLUSIVA',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'ENTRENAMIENTO DEPORTIVO',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'GESTIÓN HOTELERA INTERNACIONAL',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'PEDAGOGÍA DE LA LENGUA Y LA LITERATURA',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'PEDAGOGÍA DE LOS IDIOMAS NACIONALES Y EXTRANJEROS',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'PEDAGOGÍA DE LA ACTIVIDAD FÍSICA Y EL DEPORTE',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'PEDAGOGÍA EDUCATIVA',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'TURISMO SOSTENIBLE',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'ARQUITECTURA',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'ELECTRICIDAD',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'INGENIERÍA CIVIL',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'INGENIERÍA INDUSTRIAL',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'INGENIERÍA MARÍTIMA',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'AGROINDUSTRIA',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'AGRONEGOCIOS',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'AGROPECUARIA',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'ALIMENTOS',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'BIOLOGÍA',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'INGENIERÍA AMBIENTAL',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'SOFTWARE',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'TECNOLOGÍA DE LA INFORMACIÓN',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'COMUNICACIÓN',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'CIENCIAS POLÍTICAS Y RELACIONES INTERNACIONALES',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'CRIMINOLOGÍA Y CIENCIAS FORENSES',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'DERECHO',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'ECONOMÍA',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'GESTIÓN PUBLICA Y DESARROLLO',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'TRABAJO SOCIAL',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'ARQUEOLOGÍA',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'ARTES ESCÉNICAS',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'ARTES PLÁSTICAS',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'DISEÑO TEXTIL E INDUMENTARIA',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'SOCIOLOGÍA',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'BIENES RAÍCES',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'CONSTRUCCIÓN SISMO RESISTENTE',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'GASTRONOMÍA',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'METALMECÁNICA',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'COMUNICACIÓN PARA TELEVISIÓN, RELACIONES PÚBLICAS Y PROTOCOLOS ',
                'institucion_id' => $matriz->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],




            // CHONE
            [
                'nombre' => 'AGROPECUARIA',
                'institucion_id' => $chone->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'ARQUITECTURA',
                'institucion_id' => $chone->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'ALIMENTOS',
                'institucion_id' => $chone->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'ADMINISTRACIÓN DE EMPRESAS',
                'institucion_id' => $chone->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'ARTES PLÁSTICAS',
                'institucion_id' => $chone->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'EDUCACIÓN BÁSICA',
                'institucion_id' => $chone->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'EDUCACIÓN INICIAL',
                'institucion_id' => $chone->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'ELECTRICIDAD',
                'institucion_id' => $chone->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'ENFERMERÍA',
                'institucion_id' => $chone->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'FISIOTERAPIA',
                'institucion_id' => $chone->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'MEDICINA',
                'institucion_id' => $chone->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'NUTRICIÓN Y DIETÉTICA',
                'institucion_id' => $chone->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'ODONTOLOGÍA',
                'institucion_id' => $chone->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'PEDAGOGÍA DE LOS IDIOMAS NACIONALES Y EXTRANJEROS',
                'institucion_id' => $chone->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'TECNOLOGÍA DE LA INFORMACIÓN',
                'institucion_id' => $chone->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'SOFTWARE',
                'institucion_id' => $chone->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'ELECTROMECÁNICA',
                'institucion_id' => $chone->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'GASTRONOMÍA',
                'institucion_id' => $chone->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],



            // EL CARMEN
            [
                'nombre' => 'ADMINISTRACIÓN DE EMPRESAS',
                'institucion_id' => $elCarmen->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'AGRONEGOCIOS',
                'institucion_id' => $elCarmen->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'AGROPECUARIA',
                'institucion_id' => $elCarmen->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'ALIMENTOS',
                'institucion_id' => $elCarmen->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'AUDITORÍA Y CONTROL DE GESTIÓN',
                'institucion_id' => $elCarmen->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'EDUCACIÓN BÁSICA',
                'institucion_id' => $elCarmen->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'EDUCACIÓN INICIAL',
                'institucion_id' => $elCarmen->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'PSICOLOGÍA EDUCATIVA',
                'institucion_id' => $elCarmen->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'ENFERMERÍA',
                'institucion_id' => $elCarmen->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'FINANZAS',
                'institucion_id' => $elCarmen->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'FISIOTERAPIA',
                'institucion_id' => $elCarmen->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'INGENIERÍA EN ELECTROMECÁNICA Y ENERGÍAS RENOVABLES',
                'institucion_id' => $elCarmen->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'SOFTWARE',
                'institucion_id' => $elCarmen->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'ELECTROMECÁNICA',
                'institucion_id' => $elCarmen->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],



            // PEDERNALES
            [
                'nombre' => 'ADMINISTRACIÓN DE EMPRESAS',
                'institucion_id' => $pedernales->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'AGROPECUARIA',
                'institucion_id' => $pedernales->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'BIOLOGÍA',
                'institucion_id' => $pedernales->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'DERECHO',
                'institucion_id' => $pedernales->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'EDUCACIÓN BÁSICA',
                'institucion_id' => $pedernales->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'EDUCACIÓN INICIAL',
                'institucion_id' => $pedernales->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'ENFERMERÍA',
                'institucion_id' => $pedernales->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'FISIOTERAPIA',
                'institucion_id' => $pedernales->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'INGENIERÍA EN ELECTROMECÁNICA Y ENERGÍAS RENOVABLES',
                'institucion_id' => $pedernales->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'GASTRONOMÍA',
                'institucion_id' => $pedernales->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],


            //PICHINCHA
            [
                'nombre' => 'EDUCACIÓN BÁSICA',
                'institucion_id' => $pichincha->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'ENFERMERÍA',
                'institucion_id' => $pichincha->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],


            //FLAVIO ALFARO
            [
                'nombre' => 'EDUCACIÓN INICIAL',
                'institucion_id' => $flavioAlfaro->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'SOFTWARE',
                'institucion_id' => $flavioAlfaro->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'ELECTROMECÁNICA',
                'institucion_id' => $flavioAlfaro->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],



            // SANTO DOMINGO
            [
                'nombre' => 'ADMINISTRACIÓN DE EMPRESAS',
                'institucion_id' => $santoDomingo->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'FISIOTERAPIA',
                'institucion_id' => $santoDomingo->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'DERECHO',
                'institucion_id' => $santoDomingo->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'DISEÑO TEXTIL E INDUMENTARIA',
                'institucion_id' => $santoDomingo->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'EDUCACIÓN BÁSICA',
                'institucion_id' => $santoDomingo->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'TURISMO SOSTENIBLE',
                'institucion_id' => $santoDomingo->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'ARQUITECTURA',
                'institucion_id' => $santoDomingo->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'INGENIERÍA CIVIL',
                'institucion_id' => $santoDomingo->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'BIENES RAÍCES',
                'institucion_id' => $santoDomingo->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],




            // TOSAGUA
            [
                'nombre' => 'DERECHO',
                'institucion_id' => $tosagua->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'ENFERMERÍA',
                'institucion_id' => $tosagua->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'EDUCACIÓN BÁSICA',
                'institucion_id' => $tosagua->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'INGENIERÍA EN ELECTROMECÁNICA Y ENERGÍAS RENOVABLES',
                'institucion_id' => $tosagua->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'ELECTROMECÁNICA',
                'institucion_id' => $tosagua->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'TECNOLOGÍA SUPERIOR EN RIEGO Y PRODUCCIÓN AGRÍCOLA',
                'institucion_id' => $tosagua->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'EXPLOTACIÓN Y MANTENIMIENTO DE EQUIPOS BIOMÉDICOS',
                'institucion_id' => $tosagua->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'GASTRONOMÍA',
                'institucion_id' => $tosagua->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],



            // SANTA ANA
            [
                'nombre' => 'AGROPECUARIA',
                'institucion_id' => $santaAna->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'ELECTROMECÁNICA',
                'institucion_id' => $santaAna->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],


            //JUNÍN
            [
                'nombre' => 'EDUCACIÓN BÁSICA',
                'institucion_id' => $junin->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],


            // SAN ISIDRO
            [
                'nombre' => 'AGRONEGOCIOS',
                'institucion_id' => $sanIsidro->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],


            // PUERTO LÓPEZ
            [
                'nombre' => 'GASTRONOMÍA',
                'institucion_id' => $puertoLopez->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
