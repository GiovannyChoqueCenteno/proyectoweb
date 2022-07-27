<?php

namespace App\Http\Controllers;

use App\Models\PaginaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaginaController extends Controller
{
    //
    public function index(Request $request){
        $titulo = $request->get('titulo');
        $paginas = PaginaModel::where('titulo' , 'ILIKE','%'.$titulo.'%')->where('idrol', Auth::user()->idrol )->get();
        return view('pagina.index', compact('paginas','titulo'));
    }
}
