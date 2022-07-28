<?php

namespace App\Http\Controllers;

use App\Models\PaginaModel;
use App\Models\DocenteMateriaGrupoPeriodoModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class EstudianteController extends Controller
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
    public function egetMateriasPostuladas()
    {
        $estudiante = Auth::user();
        $materiaspostuladas = DB::table('solicitud')
            ->join('materiaofertada', function ($join) {
                $join->on('materiaofertada.idmateria', '=', 'solicitud.idmateria');
                $join->on('materiaofertada.idconvocatoria', '=', 'solicitud.idconvocatoria');
            })
            ->join('materia', 'materiaofertada.idmateria', 'materia.id')
            ->join('convocatoria', 'materiaofertada.idconvocatoria', 'convocatoria.id')
            ->join('periodo', 'convocatoria.idperiodo', 'periodo.id')
            ->where('solicitud.codigo', $estudiante->codigo)
            ->select('materia.*', 'convocatoria.id as convocatoria', 'periodo.inicio as pinicio', 'periodo.fin as pfin', 'solicitud.aceptado', 'solicitud.notafinal', 'solicitud.notaacumulada')
            ->get();
            $pagina = PaginaModel::find(11);
            $pagina->visitas++;
            $pagina->save();
        return view('estudiante.materiaspostuladas',compact('pagina'))
            ->with('materias', $materiaspostuladas);
    }

    public function elistAuxiliaresPeriodo($idperiodo)
    {
        $auxiliares = DB::table('periodo')
            ->join('docentemateriagrupoperiodo', 'periodo.id', 'docentemateriagrupoperiodo.idperiodo')
            ->join('usuario', 'docentemateriagrupoperiodo.codigoauxiliar', 'usuario.codigo')
            ->join('docentemateriagrupo', function ($join) {
                $join->on('docentemateriagrupo.idmateria', '=', 'docentemateriagrupoperiodo.idmateria');
                $join->on('docentemateriagrupo.idgrupo', '=', 'docentemateriagrupoperiodo.idgrupo');
            })
            ->join('materiagrupo', function ($join) {
                $join->on('materiagrupo.idmateria', '=', 'docentemateriagrupo.idmateria');
                $join->on('materiagrupo.idgrupo', '=', 'docentemateriagrupo.idgrupo');
            })
            ->join('materia', 'materiagrupo.idmateria', 'materia.id')
            ->join('grupo', 'materiagrupo.idgrupo', 'grupo.id')
            ->where('periodo.id', $idperiodo)
            ->select('usuario.*', 'materia.nombre as materia', 'grupo.nombre as grupo')
            ->get();

        return view('estudiante.elistaauxiliares')->with('auxiliares', $auxiliares);
    }

    public function asignarauxiliar($idmat, $idgrup, $codigod)
    {
        $periodos = DB::table('periodo')->orderByDesc('id')->limit(8)->get();

        return view('estudiante.asignarauxiliar')
            ->with('periodos', $periodos)
            ->with('idmateria', $idmat)
            ->with('idgrupo', $idgrup)
            ->with('codigod', $codigod);
    }

    public function saveAsingacionAuxiliar(Request $request)
    {
        $codigod = $request->input('codigod');
        $codigoa = $request->input('codigoa');
        $idmateria = $request->input('idmateria');
        $idgrupo = $request->input('idgrupo');
        $idperiodo = $request->input('idperiodo');

        $existeauxiliar = DB::table('auxiliar')->where('codigo', $codigoa)->first();

        if (is_null($existeauxiliar)) {
            return redirect()->route('asignar.auxiliar', [
                'idmat' => $idmateria,
                'idgrup' => $idgrupo,
                'codigod' => $codigod
            ])->with('info', 'codigo de auxiliar no valido!!!');
        }

        $asignado = DB::table('docentemateriagrupoperiodo')
            ->where('codigo', $codigod)
            ->where('idmateria', $idmateria)
            ->where('idgrupo', $idgrupo)
            ->where('idperiodo', $idperiodo)
            ->first();

        if (!is_null($asignado)) {
            return redirect()->route('asignar.auxiliar', [
                'idmat' => $idmateria,
                'idgrup' => $idgrupo,
                'codigod' => $codigod
            ])->with('info', 'ya existen un auxiliar para esta materia grupo!!!');
        }

        DocenteMateriaGrupoPeriodoModel::create([
            'codigo' => $codigod,
            'idmateria' => $idmateria,
            'idgrupo' => $idgrupo,
            'idperiodo' => $idperiodo,
            'codigoauxiliar' => $codigoa,
        ]);


        return redirect()->route('asignar.auxiliar', [
            'idmat' => $idmateria,
            'idgrup' => $idgrupo,
            'codigod' => $codigod
        ])->with('info', 'se asigno el auxiliar correctamente!!!');
    }

    public function getauxiliares()
    {
        $auxiliares = DB::table('auxiliar')
            ->join('usuario', 'auxiliar.codigo', 'usuario.codigo')
            ->select('usuario.*')
            ->get();
        $pagina = PaginaModel::find(13);
        $pagina->visitas++;
        $pagina->save();
        return view('estudiante.auxiliares',compact('pagina'))->with('auxiliares', $auxiliares);
    }
}
