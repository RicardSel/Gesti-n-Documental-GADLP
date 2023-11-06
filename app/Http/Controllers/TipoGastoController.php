<?php

namespace app\Http\Controllers;

use app\EjecucionGasto;
use app\TipoGasto;
use Illuminate\Http\Request;

class TipoGastoController extends Controller
{
    public function index()
    {
        $tipo_gastos = TipoGasto::all();
        return view('tipo_gastos.index', compact('tipo_gastos'));
    }

    public function create()
    {
        return view('tipo_gastos.create');
    }

    public function store(Request $request)
    {
        $request['fecha_registro'] = date('Y-m-d');
        TipoGasto::create(array_map('mb_strtoupper', $request->all()));
        return redirect()->route('tipo_gastos.index')->with('bien', 'Registro registrado con éxito');
    }

    public function edit(TipoGasto $tipo_gasto)
    {
        return view('tipo_gastos.edit', compact('tipo_gasto'));
    }

    public function update(TipoGasto $tipo_gasto, Request $request)
    {
        $tipo_gasto->update(array_map('mb_strtoupper', $request->all()));
        return redirect()->route('tipo_gastos.index')->with('bien', 'Registro modificado con éxito');
    }

    public function show(TipoGasto $tipo_gasto)
    {
        return 'mostrar tipo_gasto';
    }

    public function destroy(TipoGasto $tipo_gasto)
    {
        $comprueba = EjecucionGasto::where('tipo_id', $tipo_gasto->id)->get()->first();
        if ($comprueba) {
            return redirect()->route('tipo_gastos.index')->with('error', 'Error! No se puede eliminar el registro porque esta siendo utilizado');
        }
        $tipo_gasto->delete();
        return redirect()->route('tipo_gastos.index')->with('bien', 'Registro eliminado correctamente');
    }
}
