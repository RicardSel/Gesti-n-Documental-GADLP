@extends('layouts.app')

@section('css')
<!-- Custom Css -->
<link href="{{ asset('css/config.css') }}" rel="stylesheet">

<style type="text/css">
#imagen{
    width: 120px;
    height: 140px;
}

.invalid-feedback{
    color:#F44336;
}

.archivos{
    position: relative;
}

.archivos input[type="file"]{
    position: absolute;
    top: 0;
    z-index: 100;
    position: absolute;
    opacity: 0;
}

.subir{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    padding: 10px;
    background: #3594e2;
    color:#fff;
    border:0px solid #fff;
    z-index: 100;
}

.subir span{
    margin-left: 5px;
    z-index: 100;
}

.subir:hover span{
    cursor: pointer;
}
.subir:hover{
    cursor: pointer;
    color:#fff;
    background: #3682f4;
}


.image-area{
    width: 100%;
    text-align: center;
}

.image-area img{
    margin:auto;
    border-radius: 50%;
}

.content-area{
    width: 100%;
    text-align: center;
}

.content-area h3{
    font-weight: bold;
    font-size: 1.2em;
    color:rgb(114, 114, 114);
}

.content-area p{
    font-weight: 600;
    color:rgb(114, 114, 114);
}

.form-line{
    width: 90%;
}


</style>
@endsection

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Perfil Usuario</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right bg-white">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                    <li class="breadcrumb-item active">Perfil Usuario</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-4">
                <div class="card">
                    <div class="card-body" style="overflow:hidden">
                        <div class="image-area">
                        <img id="imagen_p" src="{{ asset('imgs/users/'.$user->foto) }}" alt="Imagen de perfil" width="128px" height="128px" />
                        </div>
                        <div class="content-area">
                            {!! Form::open(['route'=>['users.config_update_foto',Auth::user()->id],'method'=>'POST','class'=>'form-horizontal','id'=>'form_foto','files'=>'true']) !!}
                            <div class="col-md-12">
                                <div class="form-line archivos">
                                    <span id="info"></span>
                                    <label for="foto" class="subir">
                                        <span>Cambiar foto de perfil</span>
                                    </label>
                                    <input type="file" name="foto" id="foto" accept="image/*" onchange='cambiar()'>
                                </div>
                            </div>
                            {!! Form::close() !!}
                            <button class="btn btn-primary" id="cancelar" style="display: none">Cancelar</button>
                            <button class="btn btn-primary" id="guardar_img" style="display: none">Guardar cambios</button>
                            <h3>Usuario: {{ $user->name }}</h3>
                            <p>Tipo: {{ $user->tipo }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <div>
                            {!! Form::open(['route'=>['users.config_update',$user->id],'method'=>'PUT','class'=>'form-horizontal','id'=>'form_val']) !!}
                                <div class="form-group">
                                    <label for="OldPassword" class="col-sm-3 control-label">Antigua contraseña</label>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" class="form-control" id="OldPassword" name="oldPassword" placeholder="Antigua contraseña" required>
                                            </div>
                                            @if(session('contra_error') && session('contra_error') == 'old_password') 
                                            <span class="invalid-feedback" role="alert">
                                                <strong>La contraseña no coincide.</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="NewPassword" class="col-sm-3 control-label">Nueva contraseña</label>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" class="form-control" id="NewPassword" name="newPassword" placeholder="Nueva contraseña" minlength="6" required>
                                            </div>
                                            @if(session('contra_error') && session('contra_error') == 'comfirm') 
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Las contraseñas no coinciden. Intenten nuevamente.</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="NewPasswordConfirm" class="col-sm-3 control-label">Nueva contraseña (Confirmar)</label>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" class="form-control" id="NewPasswordConfirm" name="password_confirm" placeholder="Nueva contraseña (Confirmar)" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">GUARDAR</button>
                                        </div>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('scripts')

<script type="text/javascript">

    @if(session('bien'))
    mensajeNotificacion('{{session('bien')}}','success');
    @php
    session()->forget('bien');
    @endphp
    @endif

    @if(session('info'))
    mensajeNotificacion('{{session('info')}}','info');
    @endif

    @if(session('error'))
    mensajeNotificacion('{{session('error')}}','error');
    @endif

    $(window).ready(function(){
      //EDICION DE IMAGENES
      //Previsualizar la imagen seleccionada
      $('body').on('change','#foto',function(e){
        addImage(e);
    });
      function addImage(e){
        var file = e.target.files[0],
        imageType = /image.*/;

        if (!file.type.match(imageType))
            return;

        var reader = new FileReader();
        reader.onload = fileOnload;
        reader.readAsDataURL(file);
    }
    function fileOnload(e) {
        $('#cancelar').show();
        $('#guardar_img').show();
        var result=e.target.result;
        $('#imagen_p').attr("src",result);
    }

    $('#cancelar').click(function(){
        location.reload();
    });

    $('#guardar_img').click(function(){
        var formulario = $('#form_foto');
        var url = formulario.prop('action');
        var str = new FormData(formulario[0]);
        $.ajax({
            cache: false,
            processData: false, 
            contentType: false,
            url: url,
            headers:{'X-CSRF-TOKEN':$('#token').val()},
            type: 'POST',
            dataType: 'json',
            data: str
        })
        .done(function(resp) {
            $('#cancelar').hide();
            $('#guardar_img').hide();
            setTimeout(function(){
                location.reload();
            },2000)
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
        
        // for (var pair of str.entries()) {
        //             console.log(pair[0]+ ', ' + pair[1]); 
        // }
    });

});

    function cambiar(){
        var pdrs = document.getElementById('foto').files[0].name;
        document.getElementById('info').innerHTML = pdrs;
    }
</script>
@endsection