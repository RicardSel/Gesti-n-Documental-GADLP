<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use app\DatosUsuario;
use app\DerivarDocumento;
use app\RecepcionDocumento;

class ReporteController extends Controller
{
    public function index()
    {
        $recepcion_documentos = RecepcionDocumento::where('status', 1)->get();
        return view('reportes.index', compact('recepcion_documentos'));
    }

    public function usuarios(Request $request)
    {
        $filtro = $request->filtro;

        $usuarios = DatosUsuario::select('datos_usuarios.*', 'users.id as user_id', 'users.name as usuario', 'users.tipo', 'users.foto')
            ->join('users', 'users.id', '=', 'datos_usuarios.user_id')
            ->where('users.estado', 1)
            ->orderBy('datos_usuarios.nombre', 'ASC')
            ->get();

        if ($filtro != 'todos') {
            switch ($filtro) {
                case 'tipo':
                    $tipo = $request->tipo;
                    if ($tipo != 'todos') {

                        $usuarios = DatosUsuario::select('datos_usuarios.*', 'users.id as user_id', 'users.name as usuario', 'users.tipo', 'users.foto')
                            ->join('users', 'users.id', '=', 'datos_usuarios.user_id')
                            ->where('users.estado', 1)
                            ->where('users.tipo', $tipo)
                            ->orderBy('datos_usuarios.nombre', 'ASC')
                            ->get();
                    }
                    break;
            }
        }

        $pdf = PDF::loadView('reportes.usuarios', compact('usuarios'))->setPaper('letter', 'landscape');
        // ENUMERAR LAS PÁGINAS USANDO CANVAS
        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();
        $canvas = $dom_pdf->get_canvas();
        $alto = $canvas->get_height();
        $ancho = $canvas->get_width();
        $canvas->page_text($ancho - 90, $alto - 25, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));

        return $pdf->stream('Usuarios.pdf');
    }

    public function recepcion_documentos(Request $request)
    {
        $filtro = $request->filtro;
        $fecha_ini = $request->fecha_ini;
        $fecha_fin = $request->fecha_fin;

        $recepcion_documentos = RecepcionDocumento::where('status', 1)->orderBy('fecha_registro', 'asc')->get();

        if ($filtro != 'todos') {
            $recepcion_documentos = RecepcionDocumento::where('status', 1)
                ->whereBetween('fecha_registro', [$fecha_ini, $fecha_fin])->orderBy('fecha_registro', 'asc')->get();
        }

        $pdf = PDF::loadView('reportes.recepcion_documentos', compact('recepcion_documentos'))->setPaper('legal', 'landscape');
        // ENUMERAR LAS PÁGINAS USANDO CANVAS
        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();
        $canvas = $dom_pdf->get_canvas();
        $alto = $canvas->get_height();
        $ancho = $canvas->get_width();
        $canvas->page_text($ancho - 90, $alto - 25, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));

        return $pdf->stream('RecepcionDocumentos.pdf');
    }

    public function seguimiento_documentos(Request $request)
    {
        $filtro = $request->filtro;
        $codigo = $request->codigo;
        $fecha_ini = $request->fecha_ini;
        $fecha_fin = $request->fecha_fin;

        $recepcion_documentos = RecepcionDocumento::where('status', 1)->orderBy('fecha_registro', 'asc')->get();
        if ($filtro != 'todos') {
            switch ($filtro) {
                case 'codigo':
                    if ($codigo != 'todos') {
                        $recepcion_documentos = RecepcionDocumento::where('status', 1)->where('id', $codigo)->get();
                    }
                    break;
                case 'fecha':
                    $recepcion_documentos = RecepcionDocumento::where('status', 1)
                        ->whereBetween('fecha_registro', [$fecha_ini, $fecha_fin])->orderBy('fecha_registro', 'asc')->get();
                    break;
            }
        }


        $array_derivaciones = [];
        foreach ($recepcion_documentos as $recepcion) {
            $derivar_documentos = DerivarDocumento::where('recepcion_id', $recepcion->id)->orderBy('fecha_registro', 'asc')->get();
            $array_derivaciones[$recepcion->id] = $derivar_documentos;
        }

        $pdf = PDF::loadView('reportes.seguimiento_documentos', compact('recepcion_documentos', 'array_derivaciones'))->setPaper('portrait', 'landscape');
        // ENUMERAR LAS PÁGINAS USANDO CANVAS
        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();
        $canvas = $dom_pdf->get_canvas();
        $alto = $canvas->get_height();
        $ancho = $canvas->get_width();
        $canvas->page_text($ancho - 90, $alto - 25, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));

        return $pdf->stream('RecepcionDocumentos.pdf');
    }

    public function cantidad_documentos(Request $request)
    {
        $filtro = $request->filtro;
        $estado = $request->estado;
        $fecha_ini = $request->fecha_ini;
        $fecha_fin = $request->fecha_fin;

        $ingresos = 0;
        $salidas = 0;
        $total = 0;

        $recepcion_documentos = RecepcionDocumento::where('status', 1)->where('estado', 'INGRESO')->get();
        $ingresos = count($recepcion_documentos);
        $recepcion_documentos = RecepcionDocumento::where('status', 1)->where('estado', 'SALIDA')->get();
        $salidas = count($recepcion_documentos);

        $total = (int)$ingresos + (int)$salidas;

        if ($filtro != 'todos') {
            switch ($filtro) {
                case 'estado':
                    if ($estado != 'todos') {
                        $recepcion_documentos = RecepcionDocumento::where('status', 1)->where('estado', $estado)->get();
                        $total = count($recepcion_documentos);
                    }
                    break;
                case 'fecha':
                    $recepcion_documentos = RecepcionDocumento::where('status', 1)
                        ->whereBetween('fecha_registro', [$fecha_ini, $fecha_fin])
                        ->where('estado', 'INGRESO')
                        ->orderBy('fecha_registro', 'asc')->get();
                    $ingresos = count($recepcion_documentos);
                    $recepcion_documentos = RecepcionDocumento::where('status', 1)
                        ->whereBetween('fecha_registro', [$fecha_ini, $fecha_fin])
                        ->where('estado', 'SALIDA')
                        ->orderBy('fecha_registro', 'asc')->get();
                    $salidas = count($recepcion_documentos);
                    $total = (int)$ingresos + (int)$salidas;
                    break;
            }
        }

        if ($request->ajax()) {


            $data = [];
            if ($filtro != 'estado' || $estado == 'todos') {
                $data = [['INGRESOS', (int)$ingresos], ['SALIDAS', $salidas]];
            } elseif ($estado == 'INGRESO') {
                $data = [['INGRESOS', (int)$ingresos]];
            } else {
                $data = [['SALIDAS', $salidas]];
            }

            return response()->JSON([
                'data' => $data,
                'total' => $total
            ]);
        }

        $pdf = PDF::loadView('reportes.cantidad_documentos', compact('ingresos', 'salidas', 'total', 'filtro', 'estado', 'fecha_ini', 'fecha_fin'))->setPaper('portrait', 'landscape');
        // ENUMERAR LAS PÁGINAS USANDO CANVAS
        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();
        $canvas = $dom_pdf->get_canvas();
        $alto = $canvas->get_height();
        $ancho = $canvas->get_width();
        $canvas->page_text($ancho - 90, $alto - 25, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));

        return $pdf->stream('RecepcionDocumentos.pdf');
    }
}
