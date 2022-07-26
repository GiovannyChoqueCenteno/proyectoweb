<?php

use App\Http\Controllers\ActividadController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\ConvocatoriaController;
use App\Http\Controllers\CronogramaController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\HomeController;


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
Route::resource('cronograma', CronogramaController::class );
Route::resource('actividad', ActividadController::class);
Route::resource('grupo',GrupoController::class);
Route::resource('materia',MateriaController::class);
Route::resource('solicitud',SolicitudController::class);


Route::get('/home', [HomeController::class, 'index'])->name('home');


// Routes

Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

   
    
});
    Route::get('/estudiante', function () {return view('estudiante.main');})->name('estudiante');
    Route::get('/admin', function () {return view('admin.main');})->name('admin');
Route::get('/docente', function () {return view('docente.main');})->name('docente');
Route::middleware(['guest'])->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
});