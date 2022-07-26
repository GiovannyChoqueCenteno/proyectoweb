<?php

namespace App\Http\Controllers;

use App\Models\ConvocatoriaModel;
use App\Models\MateriaModel;
use App\Models\MateriaofertadaModel;
use App\Models\PeriodoModel;
use App\Models\SolicitudModel;
use App\Models\Tipoconvocatoria;
use App\Models\TipoconvocatoriaModel;
use Illuminate\Http\Request;

class ConvocatoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $convocatorias = ConvocatoriaModel::all();
        return view('convocatoria.index',compact('convocatorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tipoconvocatorias = TipoconvocatoriaModel::all();
        $periodos = PeriodoModel::all();
        $materias = MateriaModel::all();
        return view('convocatoria.create', compact('tipoconvocatorias' , 'periodos','materias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $convocatoria = $request->except('materia');
        $newConvocatoria =ConvocatoriaModel::create($convocatoria);
        $materias = [];
        for($i=0 ; $i<count($request->materia) ; $i++){            
            array_push($materias,[
                'idmateria' => $request->materia[$i],
                'idconvocatoria'=> $newConvocatoria->id
            ]);

        }
        MateriaofertadaModel::insert($materias);


        return redirect()->route('convocatoria.index');

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
        $solicitudes = SolicitudModel::select('solicitud.*' , 'materia.nombre')->join('materia','idmateria','=','materia.id')->where('idconvocatoria',$id)->get();
        return view('convocatoria.show',compact('solicitudes'));
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
}
