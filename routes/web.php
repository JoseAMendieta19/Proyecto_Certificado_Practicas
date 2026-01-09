<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PracticaController;

/*
|--------------------------------------------------------------------------
| Ruta pública
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Dashboard general (Breeze)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Perfil de usuario
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| RUTAS ADMINISTRADOR
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->group(function () {

    // Dashboard Admin
    Route::get('/dashboard-admin', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    // Asignar práctica
    Route::get('/admin/practica/asignar/{id}',
        [AdminController::class, 'asignarPracticaForm']
    )->name('admin.practica.create');

    Route::post('/admin/practica/guardar',
        [AdminController::class, 'guardarPractica']
    )->name('admin.practica.store');

    // Revisar prácticas
    Route::get('/admin/practica/{practica}/revisar',
        [PracticaController::class, 'revisar']
    )->name('admin.practica.revisar');

    Route::post('/admin/practica/{practica}/aprobar',
        [PracticaController::class, 'aprobar']
    )->name('admin.practica.aprobar');

    Route::post('/admin/practica/{practica}/rechazar',
        [PracticaController::class, 'rechazar']
    )->name('admin.practica.rechazar');
});

/*
|--------------------------------------------------------------------------
| RUTAS ESTUDIANTE
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:estudiante'])->group(function () {

    // Dashboard Estudiante
    Route::get('/dashboard-estudiante',
        [PracticaController::class, 'dashboardEstudiante']
    )->name('dashboard.estudiante');

    // Subir documento de práctica
    Route::post('/estudiante/practica/{id}/subir', 
            [PracticaController::class, 'subirDocumento']
        )->name('estudiante.practica.subir');
});

/*
|--------------------------------------------------------------------------
| Auth (Breeze)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
