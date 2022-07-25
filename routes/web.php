<?php

use App\Http\Controllers\ActividadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\ConvocatoriaController;
use App\Http\Controllers\CronogramaController;
use App\Http\Controllers\GrupoController;
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
Route::resource('periodo', PeriodoController::class);
Route::resource('convocatoria', ConvocatoriaController::class);
Route::resource('cronograma', CronogramaController::class );
Route::resource('actividad', ActividadController::class);
Route::resource('grupo',GrupoController::class);
Route::resource('materia',MateriaController::class);
Route::resource('solicitud',SolicitudController::class);

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
