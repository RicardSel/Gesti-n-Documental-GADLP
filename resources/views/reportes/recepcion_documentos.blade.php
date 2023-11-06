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
    </style>
</head>
<body>
    <div class="encabezado">
        <div class="logo">
            <img src="{{ asset('imgs/'.app\RazonSocial::first()->logo) }}">
        </div>
        <h2 class="titulo">
            {{ app\RazonSocial::first()->nombre }}
        </h2>
        <h4 class="texto">RECEPCIÓN DE DOCUMENTOS</h4>
        <h4 class="fecha">Expedido: {{date('Y-m-d')}}</h4>
    </div>
    <table border="1">
        <thead>
            <tr>
                <th>Código</th>
                <th>QR</th>
                <th>Fecha y Hora de Recepción</th>
                <th>Institución</th>
                <th>Nombre y Cargo de Remitente</th>
                <th>Asunto</th>
                <th>Área</th>
                <th>Caracter</th>
                <th>Nombre y Cargo de Receptor</th>
                <th>Clasificación</th>
                <th>Estado</th>
                <th>Fecha de Registro</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recepcion_documentos as $recepcion_documento)
            <tr>
                <td>{{$recepcion_documento->codigo}}</td>
                <td class="img_celda"><img src="{{asset('imgs/qr/'.$recepcion_documento->qr)}}" alt="QR" class="img-table"></td>
                <td>{{$recepcion_documento->fecha_recepcion}} {{$recepcion_documento->hora_recepcion}}</td>
                <td>{{$recepcion_documento->institucion->nombre}}</td>
                <td>{{$recepcion_documento->nombre_remitente}} <br> {{$recepcion_documento->cargo_remitente}}</td>
                <td>{{$recepcion_documento->asunto}}</td>
                <td>{{$recepcion_documento->area->nombre}}</td>
                <td>{{$recepcion_documento->caracter}}</td>
                <td>{{$recepcion_documento->nombre_receptor}} <br> {{$recepcion_documento->cargo_receptor}}</td>
                <td>{{$recepcion_documento->clasificacion->nombre}}</td>
                <td>{{$recepcion_documento->estado}}</td>
                <td>{{$recepcion_documento->fecha_registro}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>