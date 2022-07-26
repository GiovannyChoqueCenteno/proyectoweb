<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MateriaController extends Controller
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
    // 
    public function egetMateriaOfertada($id)
    {
        $materias = DB::table('materia')
            ->join('materiaofertada', 'materia.id', 'materiaofertada.idmateria')
            ->join('convocatoria', 'materiaofertada.idconvocatoria', 'convocatoria.id')
            ->join('examen', function ($join) {
                $join->on('examen.idconvocatoria', '=', 'materiaofertada.idconvocatoria');
                $join->on('examen.idmateria', '=', 'materiaofertada.idmateria');
            })
            ->join('usuario','examen.codigo','usuario.codigo')
            ->where('convocatoria.id', $id)
            ->select('materia.*','convocatoria.id as idconv','usuario.nombre as docenten','usuario.apellido as docentea')
            ->get();

        return view('materia.elistMateriaOfertada', compact('materias'));
    }
}
