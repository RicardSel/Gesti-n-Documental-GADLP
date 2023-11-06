<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CORRESPONDENCIAQR | Iniciar Sesión</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template/AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('template/AdminLTE-3.0.5/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template/AdminLTE-3.0.5/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  @yield('css')
</head>
<body class="hold-transition login-page">
@yield('content')

<!-- jQuery -->
<script src="{{asset('template/AdminLTE-3.0.5/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template/AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('template/AdminLTE-3.0.5/dist/js/adminlte.min.js')}}"></script>

@yield('scripts')

</body>
</html>
