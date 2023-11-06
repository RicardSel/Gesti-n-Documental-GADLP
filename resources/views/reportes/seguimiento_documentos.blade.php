<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>RecepciónDocumentos</title>
    <style type="text/css">
        *{
            font-family: sans-serif;
        }

        @page {
            margin-top: 2cm;
            margin-bottom: 1cm;
            margin-left: 1.5cm;
            margin-right:  1cm;
            border: 5px solid blue;
          }

        table{
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            margin-top:20px;
        }

        table thead tr th, tbody tr td{
            font-size: 0.63em;
        }
        .encabezado{
            width: 100%;
        }

        .logo img{
            position: absolute;
            width: 200px;
            height: 90px;
            top:-20px;
            left:-20px;
        }
        h2.titulo{
            width: 450px;
            margin: auto;
            margin-top:15px; 
            margin-bottom:15px; 
            text-align: center;
            font-size:14pt;
        }

        .texto{
            width: 250px;
            text-align: center;
            margin:auto;
            margin-top:15px; 
            font-weight: bold;
            font-size:1.1em;
        }

        .fecha{
            width: 250px;
            text-align: center;
            margin:auto;
            margin-top:15px; 
            font-weight: normal;
            font-size:0.85em;
        }

        .total{
            text-align: right;
            padding-right: 15px;
            font-weight: bold;
        }

        table{
            width: 100%;
        }

        table thead{
            background:rgb(236, 236, 236)
        }

        table thead tr th{
            padding: 3px;
            font-size: 0.7em;
        }

        table tbody tr td{
            padding: 3px;
            font-size: 0.55em;
        }

        table tbody tr td.franco{
            background:red;
            color:white;
        }

        .centreado{
            padding-left: 0px;
            text-align: center;
        }

        .datos{
            margin-left: 15px;
            border-top:solid 1px;
            border-collapse: collapse;
            width: 250px;
        }

        .txt{
            font-weight: bold;
            text-align: right;
            padding-right: 5px;
        }

        .txt_center{
            font-weight: bold;
            text-align: center;
        }

        .cumplimiento{
            position: absolute;
            width: 150px;
            right: 0px;
            top:86px;
        }

        .p_cump{
            color:red;
            font-size: 1.2em;
        }

        .b_top{
            border-top:solid 1px black;
        }

        .gray{
            background: rgb(202, 202, 202);
        }

        .txt_rojo{
        }

        .img_celda img{
            width: 45px;
        }

        .nueva_pagina{
            page-break-after: always;
        }

        .info_entrega{
            width: 60%;
            margin: auto;
        }
    </style>
</head>
<body>
    @php
        $cont = 0;
    @endphp
    @foreach($recepcion_documentos as $recepcion_documento)
    <div class="encabezado">
        <div class="logo">
            <img src="{{ asset('imgs/'.app\RazonSocial::first()->logo) }}">
        </div>
        <h2 class="titulo">
            {{ app\RazonSocial::first()->nombre }}
        </h2>
        <h4 class="texto">SEGUIMIENTO DE DOCUMENTO</h4>
        <h4 class="fecha">Expedido: {{date('Y-m-d')}}</h4>
    </div>

    <table class="info_entrega" border="1">
        <tr>
            <td width="30%">Código:</td>
            <td>{{ $recepcion_documento->codigo }}
            </td>
        </tr>
        <tr>
            <td width="30%">Institución:</td>
            <td>{{ $recepcion_documento->institucion->nombre }}
            </td>
        </tr>
        <tr>
            <td width="30%">Nombre y Cargo del Remitente:</td>
            <td>{{ $recepcion_documento->nombre_remitente }} {{ $recepcion_documento->cargo_remitente }}
            </td>
        </tr>
        <tr>
            <td width="30%">Asunto:</td>
            <td>{{ $recepcion_documento->asunto }}
            </td>
        </tr>
        <tr>
            <td width="30%">Área Actual:</td>
            <td>{{ $recepcion_documento->area->nombre }}
            </td>
        </tr>
        <tr>
            <td width="30%">Nombre y Cargo del Receptor:</td>
            <td>{{ $recepcion_documento->nombre_receptor }} {{ $recepcion_documento->cargo_receptor }}</td>
        </tr>
        <tr>
            <td>Clasificación:</td>
            <td>{{ $recepcion_documento->clasificacion->nombre }}
            </td>
        </tr>
        <tr>
            <td>Fecha y Hora de Recepción:</td>
            <td>{{ date('d/m/Y H:i', strtotime($recepcion_documento->fecha . ' ' . $recepcion_documento->hora)) }}</td>
        </tr>
    </table>

    <h4>DERIVACIONES</h4>
    <table border="1">
        <thead>
            <tr>
                <th>Fecha y Hora de Recepción</th>
                <th>Área</th>
                <th>Caracter</th>
                <th>Anexos</th>
                <th>Fecha de Registro</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($array_derivaciones[$recepcion_documento->id] as $derivar_documento)
                <tr>
                    <td>{{ $derivar_documento->fecha }} {{$derivar_documento->hora}}</td>
                    <td>{{ $derivar_documento->area->nombre }}</td>
                    <td>{{ $derivar_documento->caracter }}</td>
                    <td>{{ $derivar_documento->anexos }}</td>
                    <td>{{ $derivar_documento->fecha_registro }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @php
        $cont++;
    @endphp
    @if($cont < count($recepcion_documentos))
    <div class="nueva_pagina"></div>
    @endif
    @endforeach
</body>
</html>