<?php

namespace Database\Seeders;


use App\Models\Institucion;
use App\Models\Carrera;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
            'nombres' => 'Admin',
            'apellidos' => 'Sistema',
            'email' => 'admin@test.com',
            'password' => Hash::make('Contraseña123'),
            'rol' => 'admin',
            ],
        ]);
    }
}
