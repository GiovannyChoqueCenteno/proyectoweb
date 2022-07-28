<?php

namespace App\Http\Controllers;

use App\Models\PaginaModel;
use App\Models\RolModel;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $usuarios = Usuario::orderby('idrol','asc')->paginate(12);
        $pagina = PaginaModel::find(9);
        $pagina->visitas++;
        $pagina->save();
        return view('usuario.index',compact('usuarios','pagina'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = RolModel::where('id','!=',1)->get();
        return view('usuario.create',compact('roles'));
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
            "codigo" => "required|unique:usuario,codigo",
            "nombre" => "required",
            "apellido" => "required",
            "email" => "required|unique:usuario,email",
            "pass" => "required|min:6",
            "idrol" => "required"
        ]);
        $usuario = $request->all();
        $usuario['pass'] = Hash::make($request->get('pass'));
        Usuario::create($usuario);
        if($usuario['idrol'] ==2){
            DB::table('docente')->insert(array('codigo'=>$usuario['codigo']));
        }
        if($usuario['idrol'] ==3){
            DB::table('estudiante')->insert(array('codigo'=>$usuario['codigo']));
        }
        return redirect()->route('usuario.index');
    
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
    public function edit($codigo)
    {
        //
        $usuario = Usuario::where('codigo', $codigo )->first();

        return view('usuario.edit',compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $codigo)
    {
        //
        $request->validate([
            "nombre" => "required",
            "apellido" => "required",
            "email" => "required",
            "pass" => "required|min:6",
            "idrol" => "required"
        ]);
        $usuario = $request->except('_token','_method');
        $usuario['pass'] = Hash::make($request->get('pass'));
    

        DB::table('usuario')->where('codigo', $codigo)->update($usuario);
        return redirect()->route('usuario.index');
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
