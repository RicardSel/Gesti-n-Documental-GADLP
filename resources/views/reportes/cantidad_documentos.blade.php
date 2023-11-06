<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>RecepciónDocumentos</title>
    <style type="text/css">
        * {
            font-family: sans-serif;
        }

        @page {
            margin-top: 2cm;
            margin-bottom: 1cm;
            margin-left: 1.5cm;
            margin-right: 1cm;
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
            width: 450px;
            margin: auto;
            margin-top: 15px;
            margin-bottom: 15px;
            text-align: center;
            font-size: 14pt;
        }

        .texto {
            width: 250px;
            text-align: center;
            margin: auto;
            margin-top: 15px;
            font-weight: bold;
            font-size: 1.1em;
        }

        .fecha {
            width: 250px;
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
            font-size: 0.9em;
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
            width: 250px;
        }

        .txt {
            font-weight: bold;
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
            background: rgb(241, 241, 241);
        }

        .txt_rojo {}

        .img_celda img {
            width: 45px;
        }

        .nueva_pagina {
            page-break-after: always;
        }

        .info_entrega {
            width: 60%;
            margin: auto;
        }

        .bold {
            font-weight: bold;
        }

    </style>
</head>

<body>
    <div class="encabezado">
        <div class="logo">
            <img src="{{ asset('imgs/' . app\RazonSocial::first()->logo) }}">
        </div>
        <h2 class="titulo">
            {{ app\RazonSocial::first()->nombre }}
        </h2>
        <h4 class="texto">CANTIDAD DE DOCUMENTOS</h4>
        @if ($filtro == 'fecha')
            <h4 class="fecha">Del: {{ date('d-m-Y', strtotime($fecha_ini)) }} al
                {{ date('d-m-Y', strtotime($fecha_fin)) }}</h4>
        @else
            <h4 class="fecha">Expedido: {{ date('Y-m-d') }}</h4>
        @endif
    </div>

    <br><br>
    <table class="info_entrega" border="1">
        @if ($filtro != 'estado' || $estado == 'todos')
            <tr>
                <td class="txt" width="30%">INGRESOS:</td>
                <td>{{ $ingresos }}</td>
            </tr>
            <tr>
                <td class="txt" width="30%">SALIDAS:</td>
                <td>{{ $salidas }}</td>
            </tr>
            <tr>
                <td class="txt gray" width="30%">TOTAL:</td>
                <td class="gray bold">{{ $total }}</td>
            </tr>
        @else
            @if ($estado == 'INGRESO')
                <tr>
                    <td class="txt" width="30%">INGRESOS:</td>
                    <td>{{ $total }}</td>
                </tr>
                <tr>
                    <td class="txt gray" width="30%">TOTAL:</td>
                    <td class="gray bold">{{ $total }}</td>
                </tr>
            @else
                <tr>
                    <td class="txt" width="30%">SALIDAS:</td>
                    <td>{{ $total }}</td>
                </tr>
                <tr>
                    <td class="txt gray" width="30%">TOTAL:</td>
                    <td class="gray bold">{{ $total }}</td>
                </tr>
            @endif
        @endif
    </table>
</body>

</html>
