<?php
use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\PaginaModel;
use App\Models\PeriodoModel;
use Illuminate\Http\Request;

class PeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $periodos = PeriodoModel::all();
        $pagina =PaginaModel::find(1);
        $pagina->visitas++;
        $pagina->save();
        return view('periodo.index', compact('periodos', 'pagina'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pagina = PaginaModel::find(8);
        $pagina->visitas++;
        $pagina->save();
        return view('periodo.create',compact('pagina'));
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
            'inicio' => 'required',
            'fin' => 'required'
        ]);
        $periodo = $request->all();
        PeriodoModel::create($periodo);
        return redirect()->route('periodo.index');
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

    public function eListPeriodo(){
        
        $periodos = PeriodoModel::all();
        $pagina = PaginaModel::find(10);
        $pagina->visitas++;
        $pagina->save();
        return view('periodo.elist', compact('periodos' , 'pagina'));
    }
}
