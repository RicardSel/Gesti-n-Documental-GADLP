<?php

namespace app\Http\Controllers;

use app\DocumentoArchivo;
use Illuminate\Http\Request;

class DocumentoArchivoController extends Controller
{
    public function destroy(DocumentoArchivo $archivo)
    {
        \File::delete(public_path() . '/files/' . $archivo->archivo);
        $archivo->delete();
        return response()->JSON([
            'sw' => true
        ]);
    }

    public function descargar(DocumentoArchivo $archivo)
    {
        return response()->download(public_path() . '/files/' . $archivo->archivo);
    }

    public function descargar_todo(Request $request)
    {
        return response()->JSON(route('archivos.descargar',$request->id));
    }
}
