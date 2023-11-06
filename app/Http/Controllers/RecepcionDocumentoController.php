<?php

namespace app\Http\Controllers;

use app\Area;
use app\ClasificacionDocumento;
use app\DocumentoArchivo;
use Illuminate\Http\Request;
use app\EjecucionGasto;
use app\Institucion;
use app\RecepcionDocumento;
use Barryvdh\DomPDF\Facade as PDF;

class RecepcionDocumentoController extends Controller
{
    public function index()
    {
        $recepcion_documentos = RecepcionDocumento::where('status', 1)->get();
        return view('recepcion_documentos.index', compact('recepcion_documentos'));
    }

    public function create()
    {
        $institucions = Institucion::all();
        $areas = Area::all();
        $clasificacion_documentos = ClasificacionDocumento::all();

        $array_institucions[''] = 'Seleccione...';
        $array_areas[''] = 'Seleccione...';
        $array_clasificacion_documentos[''] = 'Seleccione...';
        foreach ($institucions as $value) {
            $array_institucions[$value->id] = $value->nombre;
        }

        foreach ($areas as $value) {
            $array_areas[$value->id] = $value->nombre;
        }

        foreach ($clasificacion_documentos as $value) {
            $array_clasificacion_documentos[$value->id] = $value->nombre;
        }
        return view('recepcion_documentos.create', compact('array_institucions', 'array_areas', 'array_clasificacion_documentos'));
    }

    public function store(Request $request)
    {
        $request['fecha_registro'] = date('Y-m-d');
        $request['status'] = 1;
        $array_codigo = RecepcionDocumento::ultimoCodigo();
        $request['codigo'] = $array_codigo[0];
        $request['incremento'] = $array_codigo[1];
        $request['qr'] = 'qr_pagos';
        $request['estado'] = 'INGRESO';
        $nueva_recepcion = RecepcionDocumento::create(array_map('mb_strtoupper', $request->except('archivo', 'desc_archivo')));
        /* GENERAR CÓDIGO QR */
        $codigo_qr = $nueva_recepcion->codigo . time() . '.png'; //NOMBRE DE LA IMAGEN QR
        $nueva_recepcion->qr = $codigo_qr;
        $nueva_recepcion->save();
        $text_qr = $nueva_recepcion->codigo;
        $base_64 = base64_encode(\QrCode::format('png')->size(400)->generate($text_qr));
        $imagen_codigo_qr = base64_decode($base_64);
        file_put_contents(public_path() . '/imgs/qr/' . $codigo_qr, $imagen_codigo_qr);

        if ($request->desc_archivo) {
            $desc_archivo = $request->desc_archivo;
            $archivo = $request->archivo;
            $cont = 1;
            if (count($desc_archivo) > 0) {
                for ($i = 0; $i < count($desc_archivo); $i++) {
                    $file = $archivo[$i];
                    $extension = "." . $file->getClientOriginalExtension();
                    $nom_file = $cont . '_' . $nueva_recepcion->codigo . time() . $extension;
                    $file->move(public_path() . "/files/", $nom_file);
                    $nuevo_archivo = new DocumentoArchivo([
                        'recepcion_id' => $nueva_recepcion->id,
                        'archivo' => $nom_file,
                        'descripcion' => mb_strtoupper($desc_archivo[$i]),
                    ]);
                    $cont++;
                    $nuevo_archivo->save();
                }
            }
        }

        return redirect()->route('recepcion_documentos.index')->with('bien', 'Registro registrado con éxito');
    }

    public function edit(RecepcionDocumento $recepcion_documento)
    {
        $institucions = Institucion::all();
        $areas = Area::all();
        $clasificacion_documentos = ClasificacionDocumento::all();

        $array_institucions[''] = 'Seleccione...';
        $array_areas[''] = 'Seleccione...';
        $array_clasificacion_documentos[''] = 'Seleccione...';
        foreach ($institucions as $value) {
            $array_institucions[$value->id] = $value->nombre;
        }

        foreach ($areas as $value) {
            $array_areas[$value->id] = $value->nombre;
        }

        foreach ($clasificacion_documentos as $value) {
            $array_clasificacion_documentos[$value->id] = $value->nombre;
        }
        return view('recepcion_documentos.edit', compact('recepcion_documento', 'array_institucions', 'array_areas', 'array_clasificacion_documentos'));
    }

    public function update(RecepcionDocumento $recepcion_documento, Request $request)
    {
        $recepcion_documento->update(array_map('mb_strtoupper', $request->except('archivo', 'desc_archivo', 'existe_id')));
        if ($request->desc_archivo) {
            $desc_archivo = $request->desc_archivo;
            $archivo = $request->archivo;
            $cont = 1;
            if (count($desc_archivo) > 0) {
                for ($i = 0; $i < count($desc_archivo); $i++) {
                    $file = $archivo[$i];
                    $extension = "." . $file->getClientOriginalExtension();
                    $nom_file = $cont . '_' . $recepcion_documento->codigo . time() . $extension;
                    $file->move(public_path() . "/files/", $nom_file);
                    $nuevo_archivo = new DocumentoArchivo([
                        'recepcion_id' => $recepcion_documento->id,
                        'archivo' => $nom_file,
                        'descripcion' => mb_strtoupper($desc_archivo[$i]),
                    ]);
                    $cont++;
                    $nuevo_archivo->save();
                }
            }
        }

        if ($request->existe_id) {
            $existe_id = $request->existe_id;
            $cont = 1;
            if (count($existe_id) > 0) {
                for ($i = 0; $i < count($existe_id); $i++) {
                    $busca_archivo = DocumentoArchivo::find($existe_id[$i]);
                    $busca_archivo->descripcion = mb_strtoupper($request['desc_archivo' . $existe_id[$i]]);
                    if ($request->hasFile('archivo' . $existe_id[$i])) {
                        $antiguo = $busca_archivo->archivo;
                        \File::delete(public_path() . '/files/' . $antiguo);
                        $file = $request->file('archivo' . $existe_id[$i]);
                        $extension = "." . $file->getClientOriginalExtension();
                        $nom_file = $cont . '_' . $recepcion_documento->codigo . time() . $extension;
                        $file->move(public_path() . "/files/", $nom_file);
                        $busca_archivo->archivo = $nom_file;
                    }
                    $cont++;
                    $busca_archivo->save();
                }
            }
        }
        return redirect()->route('recepcion_documentos.index')->with('bien', 'Registro modificado con éxito');
    }

    public function show(RecepcionDocumento $recepcion_documento)
    {
        return 'mostrar recepcion_documento';
    }

    public function destroy(RecepcionDocumento $recepcion_documento)
    {
        $recepcion_documento->status = 0;
        $recepcion_documento->save();
        return redirect()->route('recepcion_documentos.index')->with('bien', 'Registro eliminado correctamente');
    }

    public function busqueda()
    {
        return view('recepcion_documentos.busqueda');
    }

    public function getInfoBusqueda(Request $request)
    {
        $codigo = $request->codigo;
        // $recepcion_documento = RecepcionDocumento::with(['area','institucion','clasificacion'])->where('codigo', $codigo)->get()->first();//devuelve respuesta json con sus relaciones
        $recepcion_documento = RecepcionDocumento::where('codigo', $codigo)->get()->first();
        $html = '';
        $html = view('recepcion_documentos.parcial.informacion', compact('recepcion_documento'))->render();
        return response()->JSON([
            'sw' => true,
            'html' => $html
        ]);
    }

    public function pdfQR(RecepcionDocumento $recepcion_documento)
    {
        $pdf = PDF::loadView('recepcion_documentos.qr_pdf', compact('recepcion_documento'))->setPaper('letter', 'portrait');
        $pdf->output();
        return $pdf->stream('CodigoQR' . time() . '.pdf');
    }
}
