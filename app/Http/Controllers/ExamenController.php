<?php

namespace App\Http\Controllers;

use App\Models\ExamenModel;
use Illuminate\Http\Request;
use App\Models\NotaModel;
use App\Models\SolicitudModel;
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
        // $examen  = $request->all();
        // ExamenModel::update($examen)->where('idmateria',$examen->idmateria)->where('');
        // return redirect()->route('materiaofertada.index');

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
        $notas = DB::table('nota')
            ->join('usuario', 'nota.codigodocente', 'usuario.codigo')
            ->where('idmateria', $idmat)
            ->where('idconvocatoria', $idconv)
            ->where('codigoestudiante', $estudiante->codigo)
            ->select('nota.*', 'usuario.nombre as docentenombre', 'usuario.apellido as docenteapellido')
            ->get();

        return view('estudiante.enotas')->with('notas', $notas);
    }

    public function infoEditExamen($idmat, $idconv)
    {
        $docente = Auth::user();

        $examen = DB::table('examen')
            ->where('codigo', $docente->codigo)
            ->where('idmateria', $idmat)
            ->where('idconvocatoria', $idconv)
            ->first();

        return view('examen.eaddinfo')
            ->with('examen', $examen)
            ->with('idmateria', $idmat)
            ->with('idconvocatoria', $idconv);
    }

    public function eupdateInfoExamen(Request $request)
    {
        $docente = Auth::user();
        $idconvocatoria = $request->input('idconvocatoria');
        $idmateria = $request->input('idmateria');
        $fecha = $request->input('fecha');
        $hora = $request->input('hora');
        $lugar = $request->input('lugar');

        ExamenModel::where('idmateria', $idmateria)
            ->where('idconvocatoria', $idconvocatoria)
            ->where('codigo', $docente->codigo)
            ->update([
                'fecha' => $fecha,
                'hora' => $hora,
                'lugar' => $lugar,
            ]);

        return redirect()->route('examen.add.info', [
            'idmat' => $idmateria,
            'idconv' => $idconvocatoria
        ])->with('info', 'Se actualizo la informacion correctamente!!!');
    }

    public function eestudianteAceptados($idmat, $idconv)
    {
        $solicitudes = DB::table('solicitud')
            ->join('usuario', 'solicitud.codigo', 'usuario.codigo')
            ->where('idmateria', $idmat)
            ->where('idconvocatoria', $idconv)
            ->where('aceptado', true)
            ->select('solicitud.*', 'usuario.nombre as estudiantenombre', 'usuario.apellido as estudianteapellido')
            ->get();

        return view('examen.eestudiantesaceptados')->with('solicitudes', $solicitudes);
    }

    public function eNotaEstudiante($idmat, $idconv, $codigoe)
    {
        $docente = Auth::user();

        $nota = DB::table('nota')
            ->where('codigodocente', $docente->codigo)
            ->where('idmateria', $idmat)
            ->where('idconvocatoria', $idconv)
            ->where('codigoestudiante', $codigoe)
            ->first();

        $createnota = true;
        if (!is_null($nota)) $createnota = false;

        return view('examen.eaddNota')->with('nota', $nota)->with('createnota', $createnota);
    }

    public function ecreateNota(Request $request)
    {
        $docente = Auth::user();
        $idmateria = $request->input('idmateria');
        $idconvocatoria = $request->input('idconvocatoria');
        $codigoestudiante = $request->input('codigoestudiante');
        $notac = $request->input('notac');
        $notap = $request->input('notap');
        $notat = $notac + $notap;

        NotaModel::create([
            'codigodocente' => $docente->codigo,
            'idmateria' => $idmateria,
            'idconvocatoria' => $idconvocatoria,
            'codigoestudiante' => $codigoestudiante,
            'notaconocimiento' => $notac,
            'notapedagogica' => $notap,
            'notafinal' => $notat
        ]);

        $this->updateNotaSolicitud($codigoestudiante, $idmateria, $idconvocatoria, $notat);

        return redirect()->route('docente')->with('info', 'Se actualizo la nota correctamente !!!');
    }

    public function eUpdaeNota(Request $request)
    {
        $docente = Auth::user();
        $idmateria = $request->input('idmateria');
        $idconvocatoria = $request->input('idconvocatoria');
        $codigoestudiante = $request->input('codigoestudiante');
        $notac = $request->input('notac');
        $notap = $request->input('notap');
        $notat = $notac + $notap;

        NotaModel::where('codigodocente', $docente->codigo)
            ->where('idmateria', $idmateria)
            ->where('idconvocatoria', $idconvocatoria)
            ->where('codigoestudiante', $codigoestudiante)
            ->update([
                'notaconocimiento' => $notac,
                'notapedagogica' => $notap,
                'notafinal' => $notat
            ]);

        $this->updateNotaSolicitud($codigoestudiante, $idmateria, $idconvocatoria, $notat);

        return redirect()->route('docente')->with('info', 'Se actualizo la nota correctamente !!!');
    }

    public function updateNotaSolicitud($codigoe, $idmat, $idconv, $notat)
    {
        $solicitud = SolicitudModel::where('codigo', $codigoe)
            ->where('idmateria', $idmat)
            ->where('idconvocatoria', $idconv)
            ->first();
        
        $newnotafinal = $solicitud->notaacumulada + $notat;

        SolicitudModel::where('codigo', $codigoe)
            ->where('idmateria', $idmat)
            ->where('idconvocatoria', $idconv)
            ->update([
                'notafinal' => $newnotafinal
            ]);
    }

}
