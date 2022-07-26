<?php

namespace App\Http\Controllers;

use App\Models\PaginaModel;
use Illuminate\Http\Request;

class PaginaController extends Controller
{
    //
    public function index(Request $request){
        $titulo = $request->get('titulo');
        $paginas = PaginaModel::where('titulo' , 'ILIKE','%'.$titulo.'%')->get();
        return view('pagina.index', compact('paginas'));
    }
}
