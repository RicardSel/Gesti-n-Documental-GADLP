<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SEOCAMRFID|Control Herramientas</title>

    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('template/AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- SweetAlert2 -->
    {{-- <link rel="stylesheet" href="{{asset('template/AdminLTE-3.0.5/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}"> --}}

    {{-- SWEET ALERT --}}
    <link rel="stylesheet" href="{{asset('alerts/sweetalert/sweetalert.css')}}">


    {{-- KEYBOARD --}}
    <link rel="stylesheet" href="{{ asset('js/Keyboard-master/css/keyboard.css') }}">
    <link rel="stylesheet" href="{{ asset('js/Keyboard-master/css/keyboard-dark.css') }}">
    <link href="{{ asset('js/Keyboard-master/docs/css/tipsy.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/control.css') }}">
</head>

<body>
    {{-- FORM PARA CERRAR SESSIÓN --}}
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <ul class="opciones">
        <li><a href="" onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                data-toggle="tooltip" data-placement="bottom" title="Salir"><i class="fa fa-power-off"></i><span>
                    Salir</span></a></li>
    </ul>

    <div class="container">
        <div class="row">
            <div class="col-md-12 contenedor_empresa">
                <div class="logo">
                    <img src="{{ asset('imgs/' . $empresa->logo) }}" alt="Logo">
                </div>
                <div class="empresa">
                    {{ $empresa->name }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 ml-auto mr-auto contenedor_fecha">
                <div class="fecha" id="fecha">
                    1 de enero del 2019
                </div>
                <div class="reloj" id="reloj">
                    00 : 00 : 00 a.m.
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 ml-auto mr-auto">
                <input type="password" class="rfid" id="rfid" placeholder="Código RFID" autofocus>
                <img id="rfid-opener" class="tooltip-tipsy" title="Teclado"
                    src="{{ asset('js/Keyboard-master/css/images/keyboard.svg') }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 ml-auto mr-auto">
                <div class="accion" id="accion">
                </div>
                <div id="marcado">

                </div>
            </div>
        </div>

        <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
        <input type="hidden" id="url_accion" value="{{route('monitoreo.getAccion')}}">
        <input type="hidden" id="url_guarda" value="{{route('monitoreo.registraIS')}}">

        <script src="{{ asset('template/AdminLTE-3.0.5/plugins/jquery/jquery.min.js') }}"></script>

        <!-- Bootstrap Core Js -->
        <script src="{{ asset('template/AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.js') }}"></script>

        <!-- SweetAlert2 -->
        {{-- <script src="{{ asset('template/AdminLTE-3.0.5/plugins/sweetalert2/sweetalert2.min.js') }}"></script> --}}

        <script src="{{ asset('alerts/sweetalert/sweetalert.min.js') }}"></script>
        <script src="{{ asset('alerts/notifications.js') }}"></script>

        {{-- TECLADO --}}
        <script src="{{ asset('js/Keyboard-master/js/jquery.keyboard.js') }}"></script>
        <script src="{{ asset('js/Keyboard-master/languages/es.js') }}"></script>

        <script src="{{asset('js/Keyboard-master/docs/js/jquery.tipsy.min.js')}}"></script>
        <script src="{{asset('js/Keyboard-master/js/jquery.mousewheel.js')}}"></script>
        <script src="{{asset('js/Keyboard-master/js/jquery.keyboard.extension-typing.js')}}"></script>
        <script src="{{asset('js/Keyboard-master/js/jquery.keyboard.extension-autocomplete.js')}}"></script>
        <script src="{{asset('js/Keyboard-master/js/jquery.keyboard.extension-caret.js')}}"></script>

        <!-- Toastr -->
        <script src="{{ asset('template/AdminLTE-3.0.5/plugins/toastr/toastr.min.js') }}"></script>

        <script>
            $(document).ready(function() {
                $('#rfid').keyboard({
                        openOn: null,
                        stayOpen: true,
                        layout: 'qwerty',
                        language: 'es',
                        canceled: function(e, keyboard, el) {},
                        hidden: function(e, keyboard, el) {},
                    })
                    .addTyping();

                $('#rfid-opener').click(function() {
                    var kb = $('#rfid').getkeyboard();
                    // close the keyboard if the keyboard is visible and the button is clicked a second time
                    if (kb.isOpen) {
                        kb.close();
                        $('#rfid').focus();
                    } else {
                        kb.reveal();
                    }
                });
            });

        </script>

        {{-- CONTROL.JS --}}
        <script src="{{ asset('js/control.js') }}"></script>
</body>

</html>
