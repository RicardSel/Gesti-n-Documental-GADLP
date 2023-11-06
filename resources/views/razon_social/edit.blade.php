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
                    <li class="breadcrumb-item"><a href="{{route('razon_social.index')}}">Razón social</a></li>
                    <li class="breadcrumb-item active">Modificar</li>
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
                        <h3 class="card-title">Modificar razón social</h3>
                    </div>
                    <!-- /.card-header -->
                    {!! Form::model($razon_social,['route'=>['razon_social.update',$razon_social->id],'method'=>'put','files'=>'true']) !!}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nombre*</label>
                                        {{Form::text('nombre',null,['class'=>'form-control','required'])}}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Alias</label>
                                        {{Form::text('alias',null,['class'=>'form-control'])}}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Ciudad*</label>
                                        {{Form::text('ciudad',null,['class'=>'form-control','required'])}}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Dirección*</label>
                                        {{Form::text('dir',null,['class'=>'form-control','required'])}}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>NIT*</label>
                                        {{Form::text('nit',null,['class'=>'form-control','required'])}}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nro. de Autorización*</label>
                                        {{Form::text('nro_aut',null,['class'=>'form-control','required'])}}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Teléfono*</label>
                                        {{Form::text('fono',null,['class'=>'form-control','required'])}}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Celular*</label>
                                        {{Form::text('cel',null,['class'=>'form-control','required'])}}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Casilla</label>
                                        {{Form::text('casilla',null,['class'=>'form-control'])}}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Correo</label>
                                        {{Form::email('correo',null,['class'=>'form-control'])}}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Web</label>
                                        {{Form::email('web',null,['class'=>'form-control'])}}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Logo</label>
                                        <input type="file" name="logo" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Actividad económica</label>
                                        {{Form::text('actividad_economica',null,['class'=>'form-control','required'])}}
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-info"><i class="fa fa-update"></i> ACTUALIZAR</button>
                        </div>
                    {!! Form::close() !!}
                    <!-- /.card-body -->
                </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</section>


@php
    $script = '<script type="text/javascript">
                window.onload = function() {
                    document.getElementById("ci_exp").value = "'.$razon_social->ci_exp.'";
                };
            </script>';
@endphp 
{!! $script !!}
@section('scripts')

@endsection

@endsection
