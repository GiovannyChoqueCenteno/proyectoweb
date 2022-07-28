<?php

namespace App\Http\Controllers;

use App\Models\PaginaModel;
use App\Models\RolModel;
use App\Models\Usuario;
use Illuminate\Http\Request;
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
        $usuarios = Usuario::paginate(7);
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
        $roles = RolModel::all();
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
