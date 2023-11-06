<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use app\RecepcionDocumento;
use app\ClasificacionDocumento;

class ClasificacionDocumentoController extends Controller
{
    public function index()
    {
        $clasificacion_documentos = ClasificacionDocumento::all();
        return view('clasificacion_documentos.index', compact('clasificacion_documentos'));
    }

    public function create()
    {
        return view('clasificacion_documentos.create');
    }

    public function store(Request $request)
    {
        $request['fecha_registro'] = date('Y-m-d');
        ClasificacionDocumento::create(array_map('mb_strtoupper', $request->all()));
        return redirect()->route('clasificacion_documentos.index')->with('bien', 'Registro registrado con éxito');
    }

    public function edit(ClasificacionDocumento $clasificacion_documento)
    {
        return view('clasificacion_documentos.edit', compact('clasificacion_documento'));
    }

    public function update(ClasificacionDocumento $clasificacion_documento, Request $request)
    {
        $clasificacion_documento->update(array_map('mb_strtoupper', $request->all()));
        return redirect()->route('clasificacion_documentos.index')->with('bien', 'Registro modificado con éxito');
    }

    public function show(ClasificacionDocumento $clasificacion_documento)
    {
        return 'mostrar clasificacion_documento';
    }

    public function destroy(ClasificacionDocumento $clasificacion_documento)
    {
        $comprueba = RecepcionDocumento::where('clasificacion_id', $clasificacion_documento->id)->get()->first();
        if ($comprueba) {
            return redirect()->route('clasificacion_documentos.index')->with('error', 'Error! No se puede eliminar el registro porque esta siendo utilizado');
        }
        $clasificacion_documento->delete();
        return redirect()->route('clasificacion_documentos.index')->with('bien', 'Registro eliminado correctamente');
    }
}
