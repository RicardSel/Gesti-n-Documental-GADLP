<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use app\RecepcionDocumento;
use app\Institucion;

class InstitucionController extends Controller
{
    public function index()
    {
        $institucions = Institucion::all();
        return view('institucions.index', compact('institucions'));
    }

    public function create()
    {
        return view('institucions.create');
    }

    public function store(Request $request)
    {
        $request['fecha_registro'] = date('Y-m-d');
        Institucion::create(array_map('mb_strtoupper', $request->all()));
        return redirect()->route('institucions.index')->with('bien', 'Registro registrado con éxito');
    }

    public function edit(Institucion $institucion)
    {
        return view('institucions.edit', compact('institucion'));
    }

    public function update(Institucion $institucion, Request $request)
    {
        $institucion->update(array_map('mb_strtoupper', $request->all()));
        return redirect()->route('institucions.index')->with('bien', 'Registro modificado con éxito');
    }

    public function show(Institucion $institucion)
    {
        return 'mostrar institucion';
    }

    public function destroy(Institucion $institucion)
    {
        $comprueba = RecepcionDocumento::where('institucion_id', $institucion->id)->get()->first();
        if ($comprueba) {
            return redirect()->route('institucions.index')->with('error', 'Error! No se puede eliminar el registro porque esta siendo utilizado');
        }
        $institucion->delete();
        return redirect()->route('institucions.index')->with('bien', 'Registro eliminado correctamente');
    }
}
