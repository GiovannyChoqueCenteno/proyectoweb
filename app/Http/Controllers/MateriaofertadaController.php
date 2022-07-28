<?php

namespace App\Http\Controllers;

use App\Models\ExamenModel;
use App\Models\MateriaModel;
use App\Models\MateriaofertadaModel;
use App\Models\PaginaModel;
use App\Models\Usuario;
use Illuminate\Http\Request;

class MateriaofertadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $materiaofertadas = MateriaofertadaModel::select('materiaofertada.*' , 'materia.nombre' ,'convocatoria.fecha')->join('materia','idmateria','=','materia.id')
        ->join('convocatoria','idconvocatoria','=','convocatoria.id')->orderBy('idconvocatoria','desc')->paginate(10)  ;
        $pagina = PaginaModel::find(6);
        $pagina->visitas++;
        $pagina->save();
        return view('materiaofertada.index' ,compact('materiaofertadas','pagina'));
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
    public function edit($idmateria,$idconvocatoria)
    {
        //
        $materiaofertada = MateriaofertadaModel::where("idmateria",$idmateria)->where('idconvocatoria', $idconvocatoria)->first();
        $docentes = Usuario::where('idrol' ,2)->get();
        return view('materiaofertada.edit',compact('materiaofertada','docentes'));
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
}
