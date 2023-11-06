@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/vistas/recepcion_documentos/busqueda.css') }}">
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Recepción de documentos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right bg-white">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('recepcion_documentos.index') }}">Recepción de
                                documentos</a></li>
                        <li class="breadcrumb-item active">Busqueda</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Busqueda de Documento</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-xs-12 col-sm-12">
                                    <h3>PASAR CÓDIGO QR</h3>
                                    <div id="camara"></div>
                                </div>
                                <div class="col-md-9">
                                    <h4>RESULTADO DE BÚSQUEDA</h4>
                                    <div class="row">
                                        <div class="col-md-12" id="contenedorBusqueda">
                                            <p><b>Código: </b></p>
                                            <p><b>Fecha y Hora de Recepción: </b></p>
                                            <p><b>Institución: </b></p>
                                            <p><b>Nombre y Cargo del Remitente: </b></p>
                                            <p><b>Asunto: </b></p>
                                            <p><b>Área: </b></p>
                                            <p><b>Caracter: </b></p>
                                            <p><b>Anexos: </b></p>
                                            <p><b>Nombre y Cargo del Receptor: </b></p>
                                            <p><b>Clasificación: </b></p>
                                            <p><b>Estado: </b></p>
                                            <p><b>Fecha de Registro: </b></p>
                                            <h4>Archivos</h4>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Descripción</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- @foreach ($recepcion_documento->archivos as $archivo)
                                                        <tr class="fila_documentacion existe"
                                                            data-destroy="{{ route('documento_archivos.destroy', $archivo->id) }}">
                                                            <td> {{ $archivo->descripcion }}</td>
                                                            <td class="elimina">
                                                                <a href="{{ route('documento_archivos.descargar', $archivo->id) }}" style="margin-left:5px;"><i class="fa fa-download"></i> Descargar</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <input type="text" name="token" id="url_public" value="{{ asset('') }}" hidden>
    <input type="text" name="token" id="urlGetInfoQr" value="{{ route('recepcion_documentos.getInfoBusqueda') }}" hidden>
@endsection
@section('scripts')
    <script src="{{ asset('js/vistas/recepcion_documentos/busqueda.js') }}"></script>
@endsection
