<?php

namespace App\Http\Controllers;

use App\Models\PaginaModel;
use Illuminate\Http\Request;

use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'pass' => 'required',
        ], [
            'email.required' => 'el email es requerido',
            'pass.required' => 'el password es requeriod'
        ]);

        $usuario = Usuario::where('email', $request->input('email'))->first();

        if (is_null($usuario)) {
            return back()->withErrors([
                'email' => 'el email es incorrecto!!!',
            ])->onlyInput('pass');
        }

        if (Hash::check($request->input('pass'), $usuario->pass)) {
            Auth::login($usuario);
            $redirect = "/admin/periodo";
            $request->session()->regenerate();
            if ($usuario->idrol == 2) {
                $redirect = "/docente";
            } else if ($usuario->idrol == 3) {
                $redirect = "/estudiante";
            }
            return redirect()->intended($redirect);
        }

        return back()->withErrors([
            'pass' => 'el password es incorrecto!!!',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function graph()
    {
        $data = DB::table('pagina')->get();
        $titulos = [];
        $visitas = [];
        foreach ($data as $item) {
            array_push($titulos, $item->titulo);
            array_push($visitas, $item->visitas);
        }
        $titulos = json_encode($titulos);
        $visitas = json_encode($visitas);
        
        $pagina = PaginaModel::find(14);
        $pagina->visitas++;
        $pagina->save();
        return view('visitas.graph',compact('pagina'))->with('titulos', $titulos)
            ->with('visitas', $visitas);
    }
}
