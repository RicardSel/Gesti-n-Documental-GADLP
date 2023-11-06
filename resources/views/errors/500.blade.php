@extends('layouts.admin')

@section('pagina')
401
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/subirFoto.css')}}">
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    Error
    </h1>
    <ol class="breadcrumb">
    <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Inicio</a></li>
    <li class="active">Error</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <h3>Error del sistema!</h3>
                    <p>Algo salió mal si el problema presiste ponganse en contacto con el administrador de sistema</p>
                    <a href="{{route('home')}}" class="btn btn-primary">Volver al inicio</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
    </div>
</section>
<!-- /.content -->

@endsection

@section('scripts')
@endsection
