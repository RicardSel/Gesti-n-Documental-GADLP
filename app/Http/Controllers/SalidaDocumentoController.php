<?php

namespace app\Http\Controllers;

use app\RecepcionDocumento;
use Illuminate\Http\Request;
use app\SalidaDocumento;

class SalidaDocumentoController extends Controller
{
    public function index()
    {
        $salida_documentos = SalidaDocumento::all();
        return view('salida_documentos.index', compact('salida_documentos'));
    }

    public function create()
    {
        $recepcion_documentos = RecepcionDocumento::where('status', 1)->get();
        foreach ($recepcion_documentos as $value) {
            $array_recepcion_documentos[$value->id] = $value->codigo;
        }
        return view('salida_documentos.create', compact('array_recepcion_documentos'));
    }

    public function store(Request $request)
    {
        $request['fecha_registro'] = date('Y-m-d');
        // VALIDAR QUE NO EXISTA UN REGISTRO CON EL MISMO CÓDIGO
        $existe = SalidaDocumento::where('recepcion_id', $request->recepcion_id)->get()->first();
        if ($existe) {
            return redirect()->back()->with('error', 'Ya existe un registro del documento que intenta registrar');
        }
        $nueva_salida = SalidaDocumento::create(array_map('mb_strtoupper', $request->all()));
        $nueva_salida->recepcion->estado = 'SALIDA';
        $nueva_salida->recepcion->save();
        return redirect()->route('salida_documentos.index')->with('bien', 'Registro registrado con éxito');
    }

    public function edit(SalidaDocumento $salida_documento)
    {
        $recepcion_documentos = RecepcionDocumento::where('status', 1)->get();
        foreach ($recepcion_documentos as $value) {
            $array_recepcion_documentos[$value->id] = $value->codigo;
        }
        return view('salida_documentos.edit', compact('salida_documento', 'array_recepcion_documentos'));
    }

    public function update(SalidaDocumento $salida_documento, Request $request)
    {
        $existe = SalidaDocumento::where('recepcion_id', $request->recepcion_id)->where('id', '!=', $salida_documento->id)->get()->first();
        if ($existe) {
            return redirect()->back()->with('error', 'Ya existe un registro del documento que intenta registrar');
        }

        $salida_documento->update(array_map('mb_strtoupper', $request->all()));
        $salida_documento->recepcion->estado = 'SALIDA';
        $salida_documento->recepcion->save();
        return redirect()->route('salida_documentos.index')->with('bien', 'Registro modificado con éxito');
    }

    public function show(SalidaDocumento $salida_documento)
    {
        return 'mostrar salida_documento';
    }

    public function destroy(SalidaDocumento $salida_documento)
    {
        $salida_documento->recepcion->estado = 'INGRESO';
        $salida_documento->recepcion->save();
        $salida_documento->delete();
        return redirect()->route('salida_documentos.index')->with('bien', 'Registro eliminado correctamente');
    }
}
