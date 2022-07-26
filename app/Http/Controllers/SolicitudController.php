<?php

namespace App\Http\Controllers;

use App\Models\SolicitudModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SolicitudController extends Controller
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

    public function eSaveSolicitud(Request $request)
    {
        $request->validate([
            'idmateria' => 'required',
            'idconvocatoria' => 'required',
            'cv' => 'required|mimes:pdf'
        ]);
        $idmateria = $request->input('idmateria');
        $idconvocatoria = $request->input('idconvocatoria');
        $codigoe = Auth::user()->codigo;

        // Validar Si no mandos solicitud
        $exist = DB::table('solicitud')
            ->where('idmateria', $idmateria)
            ->where('idconvocatoria', $idconvocatoria)
            ->where('codigo', $codigoe)
            ->first();

        if ($exist) {
            return back()->with('info', 'Ya existe una solicitud para esta materia!!!');
        }

        $namefile = time() . '.pdf';

        $path = $request->file('cv')->storeAs('public', $namefile);

        $solicitudcreada = SolicitudModel::create([
            'codigo' => $codigoe,
            'idmateria' => $idmateria,
            'idconvocatoria' => $idconvocatoria,
            'aceptado' => false,
            'notaacumulada' => 0,
            'notafinal' => 0,
            'filecv' => $namefile
        ]);

        return redirect()->route('esolicitud.form', [
            'idmat' => $idmateria,
            'idconv' => $idconvocatoria
        ])->with('info', 'La solicitud se envio correctamente!!!');
    }

    public function eFormSolicitud($idmat, $idconv)
    {
        return view('solicitud.eform')
            ->with('idmateria', $idmat)
            ->with('idconvocatoria', $idconv);
    }
}
