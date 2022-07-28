<?php

namespace App\Http\Controllers;

use App\Models\ActividadModel;
use App\Models\CronogramaModel;
use App\Models\PaginaModel;
use App\Models\PeriodoModel;
use App\Models\TipoconvocatoriaModel;
use Illuminate\Http\Request;

class CronogramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cronogramas = CronogramaModel::all();
        $pagina =PaginaModel::find(2);
        $pagina->visitas++;
        $pagina->save();
        return view('cronograma.index' ,compact('cronogramas' , 'pagina'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $periodos = PeriodoModel::all();
        $pagina = PaginaModel::find(7);
        $pagina->visitas++;
        $pagina->save();
        return view('cronograma.create',compact('periodos','pagina'));
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
        $request->validate([
            "fecha" => "required",
            "idperiodo" => "required",
        ]);
        CronogramaModel::create($request->all());
        return redirect()->route('cronograma.index');
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
        $actividades = ActividadModel::where('idcronograma', $id)->get();
        return view('cronograma.show', compact('actividades'));
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
