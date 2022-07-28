<?php

use App\Http\Controllers\ActividadController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\ConvocatoriaController;
use App\Http\Controllers\CronogramaController;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MateriaofertadaController;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\UsuarioController;
use App\Models\MateriaofertadaModel;
use App\Models\Usuario;

use App\Http\Controllers\DocenteController;
use App\Http\Controllers\EstudianteController;



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





Route::get('/home', [HomeController::class, 'index'])->name('home');


// Routes

Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::resource('periodo', PeriodoController::class);
        Route::resource('convocatoria', ConvocatoriaController::class);
        Route::resource('cronograma', CronogramaController::class);
        Route::resource('actividad', ActividadController::class);
        Route::resource('grupo', GrupoController::class);
        Route::resource('materia', MateriaController::class);
        Route::resource('solicitud', SolicitudController::class, ['only' => ['index', 'create', 'store']]);
        Route::get('solicitud/{codigo}/{idmateria}/{idconvocatoria}', [SolicitudController::class, 'edit'])->name('solicitud.edit');
        Route::put('solicitud/{codigo}/{idmateria}/{idconvocatoria}', [SolicitudController::class, 'update'])->name('solicitud.update');
        Route::get('materiaofertada', [MateriaofertadaController::class, 'index'])->name('materiaofertada.index');
        Route::get('materia/{idmateria}/{idconvocatoria}', [MateriaofertadaController::class, 'edit'])->name('materiaofertada.edit');
        Route::resource('usuario', UsuarioController::class);
        Route::resource('examen', ExamenController::class);
        Route::resource('cronograma', CronogramaController::class);

        Route::get('visitas', [AuthController::class, 'graph'])->name('graph.visitas');
        Route::get('docente/materia', [DocenteController::class, 'getMateriaDocente'])->name('materia.docente');
        Route::get('materia/auxiliar/{idmat}/{idgrup}/{codigod}', [EstudianteController::class, 'asignarauxiliar'])->name('asignar.auxiliar');
        Route::post('materia/auxiliar/save', [EstudianteController::class, 'saveAsingacionAuxiliar'])->name('save.asignacion.auxiliar');
        Route::get('eauxiliares', [EstudianteController::class, 'getauxiliares'])->name('auxiliares');
        Route::get('solicitud/form/response/{codigoe}/{idmat}/{idconv}', [SolicitudController::class, 'formsolres'])->name('solicitud.form.resp');
        Route::post('solicitud/form/response', [SolicitudController::class, 'eupdateSolicitud'])->name('solicitud.form.update');
    });
    Route::get('pagina', [PaginaController::class, 'index'])->name('pagina.index');

    Route::get('/create/auxiliar', [EstudianteController::class, 'createaux'])->name('create.auxiliar');
    Route::post('/save/auxiliar', [EstudianteController::class, 'saveaux'])->name('save.auxiliar');

    // Estudiante
    Route::get('/estudiante', [PeriodoController::class, 'eListPeriodo'])->name('estudiante');
    Route::get('/econvocatoria/{id}', [ConvocatoriaController::class, 'egetConvocatoriaByPeriodo'])->name('econvocatoria.list');
    Route::get('/ematerias/{id}', [MateriaController::class, 'egetMateriaOfertada'])->name('emateria.list');
    Route::get('/esolictud/{idmat}/{idconv}', [SolicitudController::class, 'eFormSolicitud'])->name('esolicitud.form');
    Route::post('/esolictud/save', [SolicitudController::class, 'eSaveSolicitud'])->name('esolicitud.save');
    Route::get('/emateriaspostuladas', [EstudianteController::class, 'egetMateriasPostuladas'])->name('emateria.postulada');
    Route::get('/eexamen/detalle/{idmat}/{idconv}', [ExamenController::class, 'infoExamen'])->name('eexamen.detalle');
    Route::get('/eexamen/nota/{idmat}/{idconv}', [ExamenController::class, 'notaExamen'])->name('eexamen.nota');
    Route::get('/eauxiliar/materia/{idperiodo}', [EstudianteController::class, 'elistAuxiliaresPeriodo'])->name('eauxiliar.listar');



    // Docente
    Route::get('/docente', [DocenteController::class, 'emateriasAsignadas'])->name('docente');
    Route::get('/examen/add/info/{idmat}/{idconv}', [ExamenController::class, 'infoEditExamen'])->name('examen.add.info');
    Route::post('/examem/update/info', [ExamenController::class, 'eupdateInfoExamen'])->name('examen.update.info');
    Route::get('/examen/aceptados/{idmat}/{idconv}', [ExamenController::class, 'eestudianteAceptados'])->name('examen.aceptados');
    Route::get('/examen/nota/add/{idmat}/{idconv}/{codigoe}', [ExamenController::class, 'eNotaEstudiante'])->name('examen.add.nota');
    Route::post('/examen/create/nota', [ExamenController::class, 'ecreateNota'])->name('examen.create.nota');
    Route::post('/examen/update/nota', [ExamenController::class, 'eUpdaeNota'])->name('examen.update.nota');
    Route::get('/docente/auxiliares/materia', [DocenteController::class, 'misAuxiliares'])->name('docente.auxiliar.materia');


    // Admin
    Route::get('/admin', function () {
        return view('admin.main');
    })->name('admin');
});


Route::middleware(['guest'])->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
});
