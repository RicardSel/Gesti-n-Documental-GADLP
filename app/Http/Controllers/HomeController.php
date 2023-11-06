<?php

namespace app\Http\Controllers;

use app\CargoCuenta;
use app\EjecucionGasto;
use app\Funcionario;
use app\Herramienta;
use app\MaterialObra;
use app\Obra;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use app\User;
use app\RecepcionDocumento;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usuarios = count(User::select('users.*')
            ->join('datos_usuarios', 'datos_usuarios.user_id', '=', 'users.id')
            ->where('users.estado', 1)
            ->get());

        $recepcion_documentos = count(RecepcionDocumento::where('status', 1)->get());
        $salida_documentos = count(RecepcionDocumento::where('status', 1)->where('estado', 'SALIDA')->get());

        return view('home', compact('usuarios', 'recepcion_documentos', 'salida_documentos'));
    }
}
