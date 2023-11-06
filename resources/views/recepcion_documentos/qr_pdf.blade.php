<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>QREntrega</title>
    <style type="text/css">
        * {
            font-family: sans-serif;
        }

        @page {
            margin-top: 0.5cm;
            margin-bottom: 0.5cm;
            margin-left: 0.5cm;
            margin-right: 0.5cm;
            border: 5px solid blue;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            margin-top: 20px;
        }

        table thead tr th,
        tbody tr td {
            font-size: 0.63em;
        }

        .encabezado {
            width: 100%;
        }

        .logo img {
            position: absolute;
            width: 200px;
            height: 90px;
            top: -20px;
            left: -20px;
        }

        h2.titulo {
            width: 300px;
            font-size: 14pt;
            margin-top: 0px;
            text-align: center;
        }

        .texto {
            width: 300px;
            font-weight: bold;
            font-size: 1.1em;
            text-align: center;
            margin-top: -10px;
        }

        .fecha {
            width: 300px;
            text-align: center;
            margin: auto;
            margin-top: 15px;
            font-weight: normal;
            font-size: 0.85em;
        }

        .total {
            text-align: right;
            padding-right: 15px;
            font-weight: bold;
        }

        table {
            width: 100%;
        }

        table thead {
            background: rgb(236, 236, 236)
        }

        table thead tr th {
            padding: 3px;
            font-size: 0.7em;
        }

        table tbody tr td {
            padding: 3px;
            font-size: 0.55em;
        }

        table tbody tr td.franco {
            background: red;
            color: white;
        }

        .centreado {
            padding-left: 0px;
            text-align: center;
        }

        .datos {
            margin-left: 15px;
            border-top: solid 1px;
            border-collapse: collapse;
            width: 300px;
        }

        .txt {
            font-weight: bold;
            text-align: right;
            padding-right: 5px;
        }

        .txt_center {
            font-weight: bold;
            text-align: center;
        }

        .cumplimiento {
            position: absolute;
            width: 150px;
            right: 0px;
            top: 86px;
        }

        .p_cump {
            color: red;
            font-size: 1.2em;
        }

        .b_top {
            border-top: solid 1px black;
        }

        .gray {
            background: rgb(202, 202, 202);
        }

        .txt_rojo {}

        .img_celda img {
            width: 120px;
        }

        .info_entrega {
            margin-top: 0px;
            width: 300px;
        }

    </style>
</head>

<body>
    {{-- <div class="encabezado">
        <h2 class="titulo">
            {{ app\RazonSocial::first()->nombre }}
        </h2>
    </div> --}}

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
            <td width="30%">Área:</td>
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
        <tr>
            <td colspan="2" class="centreado img_celda">
                <img src="{{ asset('imgs/qr/' . $recepcion_documento->qr) }}" alt="QR">
            </td>
        </tr>
    </table>
</body>

</html>
