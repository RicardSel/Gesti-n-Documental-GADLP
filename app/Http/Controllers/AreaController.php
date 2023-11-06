<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use app\RecepcionDocumento;
use app\Area;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::all();
        return view('areas.index', compact('areas'));
    }

    public function create()
    {
        return view('areas.create');
    }

    public function store(Request $request)
    {
        $request['fecha_registro'] = date('Y-m-d');
        Area::create(array_map('mb_strtoupper', $request->all()));
        return redirect()->route('areas.index')->with('bien', 'Registro registrado con éxito');
    }

    public function edit(Area $area)
    {
        return view('areas.edit', compact('area'));
    }

    public function update(Area $area, Request $request)
    {
        $area->update(array_map('mb_strtoupper', $request->all()));
        return redirect()->route('areas.index')->with('bien', 'Registro modificado con éxito');
    }

    public function show(Area $area)
    {
        return 'mostrar area';
    }

    public function destroy(Area $area)
    {
        $comprueba = RecepcionDocumento::where('area_id', $area->id)->get()->first();
        if ($comprueba) {
            return redirect()->route('areas.index')->with('error', 'Error! No se puede eliminar el registro porque esta siendo utilizado');
        }
        $area->delete();
        return redirect()->route('areas.index')->with('bien', 'Registro eliminado correctamente');
    }
}
