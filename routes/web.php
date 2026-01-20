<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PracticaController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\InstitucionController;

// 🆕 Nuevos controladores
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LugarPracticaController;
use App\Http\Controllers\Admin\ValidacionController;
use App\Http\Controllers\Admin\ReporteController;
// use App\Http\Controllers\Admin\CertificadoController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\CertificadoController;



Route::middleware(['auth', 'role:estudiante'])->group(function () {

    Route::get('/certificado/final/ver', [CertificadoController::class, 'vistaFinal'])
        ->name('certificado.final.vista');

    Route::get('/certificado/final/descargar', [CertificadoController::class, 'descargarFinal'])
        ->name('certificado.final.descargar');

});








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
| VALIDACIONES EN TIEMPO REAL (REGISTRO)
|--------------------------------------------------------------------------
*/
Route::post('/validar-cedula', [RegisteredUserController::class, 'validarCedula'])
    ->name('validar.cedula');

Route::post('/validar-email', [RegisteredUserController::class, 'validarEmail'])
    ->name('validar.email');

/*
|--------------------------------------------------------------------------
| COMBO DEPENDIENTE (Institución → Carreras)
|--------------------------------------------------------------------------
*/
Route::get(
    '/instituciones/{institucion}/carreras',
    [RegisteredUserController::class, 'carrerasPorInstitucion']
)->name('instituciones.carreras');

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
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // 📊 Dashboard principal
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        // 👥 Gestión de Estudiantes
        Route::get('/estudiantes', [AdminController::class, 'dashboard'])
            ->name('estudiantes.index');

        Route::get('/estudiantes/{id}/asignar', [AdminController::class, 'asignarPracticaForm'])
            ->name('estudiantes.asignar');

        Route::post('/estudiantes/practica/guardar', [AdminController::class, 'guardarPractica'])
            ->name('practica.store');

        // 📍 Gestión de Lugares de Práctica (CRUD completo)
        // 🔧 CORRECCIÓN CLAVE DEL PROBLEMA "lugare"
        Route::resource('lugares', LugarPracticaController::class)
            ->parameters(['lugares' => 'lugar']);

        // ✅ Validación de Documentos
        Route::get('/validaciones', [ValidacionController::class, 'index'])
            ->name('validaciones.index');

        Route::get('/validaciones/{practica}/revisar', [ValidacionController::class, 'revisar'])
            ->name('validaciones.revisar');

        Route::post('/validaciones/{practica}/aprobar', [ValidacionController::class, 'aprobar'])
            ->name('validaciones.aprobar');

        Route::post('/validaciones/{practica}/rechazar', [ValidacionController::class, 'rechazar'])
            ->name('validaciones.rechazar');

        // 📄 Reportes
        Route::get('/reportes', [ReporteController::class, 'index'])
            ->name('reportes.index');

        Route::get('/reportes/descargar', [ReporteController::class, 'descargar'])
            ->name('reportes.descargar');

        // ⚙️ Perfil Admin
        Route::get('/perfil', [ProfileController::class, 'edit'])
            ->name('perfil');
    });

/*
|--------------------------------------------------------------------------
| RUTAS ESTUDIANTE
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:estudiante'])->group(function () {

    // 🏠 Dashboard (HOME del estudiante)
    Route::get('/dashboard-estudiante', [EstudianteController::class, 'dashboard'])
        ->name('estudiante.dashboard');

    // 📘 Mis Prácticas
    Route::get('/estudiante/practicas', [EstudianteController::class, 'practicas'])
        ->name('estudiante.practicas');

    // 📤 Subir documentos
    Route::post('/estudiante/practica/{id}/subir', [PracticaController::class, 'subirDocumento'])
        ->name('estudiante.practica.subir');

    // 👤 Perfil
    Route::get('/estudiante/perfil', [PracticaController::class, 'editarPerfil'])
        ->name('estudiante.perfil');

    // 📄 Certificados
    // 📄 Certificados - IMPORTANTE: Usar CertificadoController SIN namespace Admin
    Route::get('/certificado/{practica}/descargar', [\App\Http\Controllers\CertificadoController::class, 'descargar'])
        ->name('certificado.descargar');

    Route::get('/certificado/{practica}/vista', [\App\Http\Controllers\CertificadoController::class, 'vista'])
        ->name('certificado.vista');
});




// Rutas para Admin - Gestión de Estudiantes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    
    Route::get('/estudiantes', [AdminController::class, 'indexEstudiantes'])->name('admin.estudiantes.index');
    Route::get('/estudiantes/{id}/editar', [AdminController::class, 'editEstudiante'])->name('admin.estudiantes.edit');
    Route::put('/estudiantes/{id}', [AdminController::class, 'updateEstudiante'])->name('admin.estudiantes.update');
    Route::delete('/estudiantes/{id}', [AdminController::class, 'destroyEstudiante'])->name('admin.estudiantes.destroy');
});



Route::get('/estudiante/certificados', function () {
    return view('estudiante.certificados');
})->name('estudiante.certificados');




Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/certificados', [CertificadoController::class, 'index'])
            ->name('certificados.index');

    });

/*
|--------------------------------------------------------------------------
| Auth (Breeze)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
