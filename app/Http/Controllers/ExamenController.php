<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExamenController extends Controller
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

    public function infoExamen($idmat, $idconv)
    {
        $examenes = DB::table('examen')
            ->where('idconvocatoria', $idconv)
            ->where('idmateria', $idmat)
            ->join('usuario', 'examen.codigo', 'usuario.codigo')
            ->select('examen.*', 'usuario.nombre as docentenombre', 'usuario.apellido as docenteapellido')
            ->get();

        return view('examen.edetalle')
            ->with('examenes', $examenes);
    }
    public function notaExamen($idmat, $idconv)
    {
        $estudiante = Auth::user();
        $notas=DB::table('nota')
             ->join('usuario','nota.codigodocente','usuario.codigo')
             ->where('idmateria',$idmat)
             ->where('idconvocatoria',$idconv)
             ->where('codigoestudiante',$estudiante->codigo)
             ->select('nota.*','usuario.nombre as docentenombre','usuario.apellido as docenteapellido')
             ->get();

        return view('estudiante.enotas')->with('notas',$notas);
    }
}
