@extends('layouts.app')

@section('css')
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Recepción de documentos</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                    <li class="breadcrumb-item active">Recepción de ocumentos</li>
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
                        {{-- <h3 class="card-title"></h3> --}}
                        <a href="{{route('recepcion_documentos.create')}}" class="btn btn-info"><i class="fa fa-plus"></i> Nuevo</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table data-table table-bordered table-hover">
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
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $cont = 1;
                                @endphp
                                @foreach($recepcion_documentos as $recepcion_documento)
                                <tr>
                                    <td>{{$recepcion_documento->codigo}}</td>
                                    <td><img src="{{asset('imgs/qr/'.$recepcion_documento->qr)}}" alt="QR" class="img-table"></td>
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
                                    <td class="btns-opciones">
                                        <a href="{{route('recepcion_documentos.pdfQR',$recepcion_documento->id)}}" class="evaluar" target="_blank"><i class="fa fa-qrcode" data-toggle="tooltip" data-placement="left" title="Código QR"></i></a>
                                        <a href="{{route('recepcion_documentos.edit',$recepcion_documento->id)}}" class="modificar"><i class="fa fa-edit" data-toggle="tooltip" data-placement="left" title="Modificar"></i></a>
                                        <a href="#" data-url="{{route('recepcion_documentos.destroy',$recepcion_documento->id)}}" data-toggle="modal" data-target="#modal-eliminar" class="eliminar"><i class="fa fa-trash" data-toggle="tooltip" data-placement="left" title="Eliminar"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</section>

@include('modal.eliminar')

@section('scripts')
<script>
    @if(session('bien'))
    mensajeNotificacion('{{session('bien')}}','success');
    @endif

    @if(session('info'))
    mensajeNotificacion('{{session('info')}}','info');
    @endif

    @if(session('error'))
    mensajeNotificacion('{{session('error')}}','error');
    @endif

     $('table.data-table').DataTable({
        columns : [
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            {width:"10%"},
        ],
        scrollCollapse: true,
        language: lenguaje,
        pageLength:25
    });

 
    // ELIMINAR
    $(document).on('click','table tbody tr td.btns-opciones a.eliminar',function(e){
        e.preventDefault();
        let recepcion_documento = $(this).parents('tr').children('td').eq(1).text();
        $('#mensajeEliminar').html(`¿Está seguro(a) de eliminar al registro <b>${recepcion_documento}</b>?`);
        let url = $(this).attr('data-url');
        console.log($(this).attr('data-url'));
        $('#formEliminar').prop('action',url);
    });

    $('#btnEliminar').click(function(){
        $('#formEliminar').submit();
    });

</script>
@endsection

@endsection
