<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\ConvocatoriaController;
use App\Http\Controllers\CronogramaController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\SolicitudController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/prueba', function () {
    return view('prueba');
});

Route::resource('periodo', PeriodoController::class);
Route::resource('convocatoria', ConvocatoriaController::class);
Route::resource('cronograma', CronogramaController::class);



Route::get('/home', [HomeController::class, 'index'])->name('home');


// Routes

Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    // Estudiante
    Route::get('/estudiante', [PeriodoController::class, 'eListPeriodo'])->name('estudiante');
    Route::get('/econvocatoria/{id}', [ConvocatoriaController::class, 'egetConvocatoriaByPeriodo'])->name('econvocatoria.list');
    Route::get('/ematerias/{id}', [MateriaController::class, 'egetMateriaOfertada'])->name('emateria.list');
    Route::get('/esolictud/{idmat}/{idconv}', [SolicitudController::class, 'eFormSolicitud'])->name('esolicitud.form');
    Route::post('/esolictud/save',[SolicitudController::class,'eSaveSolicitud'])->name('esolicitud.save');
    Route::get('/emateriaspostuladas', [EstudianteController::class, 'egetMateriasPostuladas'])->name('emateria.postulada');
    Route::get('/eexamen/detalle/{idmat}/{idconv}', [ExamenController::class, 'infoExamen'])->name('eexamen.detalle');
    Route::get('/eexamen/nota/{idmat}/{idconv}', [ExamenController::class, 'notaExamen'])->name('eexamen.nota');
    Route::get('/eauxiliar/materia/{idperiodo}', [EstudianteController::class, 'elistAuxiliaresPeriodo'])->name('eauxiliar.listar');

    // Admin
    Route::get('/admin', function () {
        return view('admin.main');
    })->name('admin');

    // Docente
    Route::get('/docente', function () {
        return view('docente.main');
    })->name('docente');
});

Route::middleware(['guest'])->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
});
