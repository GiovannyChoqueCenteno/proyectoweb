<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function emateriasAsignadas()
    {
        $docente = Auth::user();
        $materiasasignadas = DB::table('periodo')
            ->join('convocatoria', 'periodo.id', 'convocatoria.idperiodo')
            ->join('materiaofertada', 'convocatoria.id', 'materiaofertada.idconvocatoria')
            ->join('materia', 'materiaofertada.idmateria', 'materia.id')
            ->join('examen', function ($join) {
                $join->on('examen.idmateria', '=', 'materiaofertada.idmateria');
                $join->on('examen.idconvocatoria', '=', 'materiaofertada.idconvocatoria');
            })
            ->join('docente', 'examen.codigo', 'docente.codigo')
            ->where('docente.codigo', $docente->codigo)
            ->select('materia.*', 'convocatoria.id as convocatoria', 'periodo.inicio as pinicio', 'periodo.fin as pfin')
            ->get();

        return view('materia.elistmateriaAsignadas')->with('materias', $materiasasignadas);
    }

    public function misAuxiliares()
    {
        $docente = Auth::user();
        $auxiliares = DB::table('periodo')
            ->join('docentemateriagrupoperiodo', 'periodo.id', 'docentemateriagrupoperiodo.idperiodo')
            ->join('usuario', 'docentemateriagrupoperiodo.codigoauxiliar', 'usuario.codigo')
            ->join('docentemateriagrupo', function ($join) {
                $join->on('docentemateriagrupo.codigo', '=', 'docentemateriagrupoperiodo.codigo');
                $join->on('docentemateriagrupo.idmateria', '=', 'docentemateriagrupoperiodo.idmateria');
                $join->on('docentemateriagrupo.idgrupo', '=', 'docentemateriagrupoperiodo.idgrupo');
            })
            ->join('materiagrupo', function ($join) {
                $join->on('materiagrupo.idmateria', '=', 'docentemateriagrupo.idmateria');
                $join->on('materiagrupo.idgrupo', '=', 'docentemateriagrupo.idgrupo');
            })
            ->join('materia', 'materiagrupo.idmateria', 'materia.id')
            ->join('grupo', 'materiagrupo.idgrupo', 'grupo.id')
            ->where('docentemateriagrupoperiodo.codigo', $docente->codigo)
            ->select('materia.nombre as materia', 'grupo.nombre as grupo', 'usuario.*', 'periodo.inicio as pinicio', 'periodo.fin as pfin')
            ->get();

        return view('docente.misauxiliares')->with('auxiliares', $auxiliares);
    }

    public function getMateriaDocente()
    {
        $docentesmaterias = DB::table('docentemateriagrupo')
            ->join('usuario', 'docentemateriagrupo.codigo', 'usuario.codigo')
            ->join('materiagrupo', function ($join) {
                $join->on('materiagrupo.idmateria', '=', 'docentemateriagrupo.idmateria');
                $join->on('materiagrupo.idgrupo', '=', 'docentemateriagrupo.idgrupo');
            })
            ->join('materia', 'materiagrupo.idmateria', 'materia.id')
            ->join('grupo', 'materiagrupo.idgrupo', 'grupo.id')
            ->select('usuario.*', 'materiagrupo.*', 'materia.nombre as materia', 'grupo.nombre as grupo')
            ->get();

        return view('materia.docentemateria')->with('docentesmaterias', $docentesmaterias);
    }
}
