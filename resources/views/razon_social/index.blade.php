@extends('layouts.app')

@section('css')
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Razón social</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                    <li class="breadcrumb-item active">Razón social</li>
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
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Alias</th>
                                    <th>Ciudad</th>
                                    <th>Dirección</th>
                                    <th>NIT</th>
                                    <th>Nro. Autorización</th>
                                    <th>Teléfono - Celular</th>
                                    <th>Casilla</th>
                                    <th>Correo</th>
                                    <th>web</th>
                                    <th>Logo</th>
                                    <th>Actividad económica</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$razon_social->nombre}}</td>
                                    <td>{{$razon_social->alias}}</td>
                                    <td>{{$razon_social->ciudad}}</td>
                                    <td>{{$razon_social->dir}}</td>
                                    <td>{{$razon_social->nit}}</td>
                                    <td>{{$razon_social->nro_aut}}</td>
                                    <td>{{$razon_social->fono?:'S/N'}} {{$razon_social->cel?:'S/N'}}</td>
                                    <td>{{$razon_social->casilla}}</td>
                                    <td>{{$razon_social->correo}}</td>
                                    <td>{{$razon_social->web}}</td>
                                    <td><img src="{{asset('imgs/'.$razon_social->logo)}}" alt="Logo" class="img-table"></td>
                                    <td>{{$razon_social->actividad_economica}}</td>
                                    <td class="btns-opciones">
                                        <a href="{{route('razon_social.edit',$razon_social->id)}}" class="modificar"><i class="fa fa-edit" data-toggle="tooltip" data-placement="left" title="Modificar"></i></a>
                                    </td>
                                </tr>
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
        responsive: true,
        columns : [
            {width:"5%"},
            null,
            null,
            {width:"10%"},
            {width:"15%"},
        ],
        scrollCollapse: true,
        language: lenguaje,
        pageLength:25
    });

 
    // ELIMINAR
    $(document).on('click','table tbody tr td.btns-opciones a.eliminar',function(e){
        e.preventDefault();
        let razon_social = $(this).parents('tr').children('td').eq(1).text();
        $('#mensajeEliminar').html(`¿Está seguro(a) de eliminar la razon_social <b>${razon_social}</b>?`);
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
