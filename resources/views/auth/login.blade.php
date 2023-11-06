@extends('layouts.login')

@section('css')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection

@section('content')

<div class="login-box">
    <div class="login-logo">
        <a href="" class="text-white"><b>{{app\RazonSocial::first()->nombre}}</b></a>
        <img src="{{asset('imgs/'.app\RazonSocial::first()->logo)}}" alt="Logo">
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg text-white">Iniciar Sesión</p>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" autofocus placeholder="Usuario">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-user text-white"></span>
                        </div>
                    </div>
                    @error('name')
                    <span class="invalid-feedback" style="display:block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Contraseña">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock text-white"></span>
                        </div>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" style="display:block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="row">
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-default btn-block bg-blue">Acceder</button>
                </div>
                <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
@endsection
