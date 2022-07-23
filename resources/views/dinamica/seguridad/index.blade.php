<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Company Name | Login</title>


    <link rel="apple-touch-icon" sizes="57x57" href="{{asset("assets/sb/assets/img/fav/apple-icon-57x57.png")}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset("assets/sb/assets/img/fav/apple-icon-60x60.png")}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset("assets/sb/assets/img/fav/apple-icon-72x72.png")}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset("assets/sb/assets/img/fav/apple-icon-76x76.png")}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset("assets/sb/assets/img/fav/apple-icon-114x114.png")}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset("assets/sb/assets/img/fav/apple-icon-120x120.png")}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset("assets/sb/assets/img/fav/apple-icon-144x144.png")}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset("assets/sb/assets/img/fav/apple-icon-152x152.png")}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset("assets/sb/assets/img/fav/apple-icon-180x180.png")}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{asset("assets/sb/assets/img/fav/android-icon-192x192.png")}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset("assets/sb/assets/img/fav/favicon-32x32.png")}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset("assets/sb/assets/img/fav/favicon-96x96.png")}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset("assets/sb/assets/img/fav/favicon-16x16.png")}}">
    <link rel="manifest" href=imagenes/fav/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset("assets/$theme/plugins/fontawesome-free/css/all.min.css")}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset("assets/$theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset("assets/$theme/dist/css/adminlte.min.css")}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{route('inicio')}}">Company Name</a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
        <h5 class="text-info">This is a demo of this company app</h5>
        <p>Please be careful when testing the application as others people could see your saved information, consider the following points:</p>

        <ul class="list-group">
            <li class="list-group-item"><b>Superadmin user:</b> wbartlett , password: pass123</li>
            <li class="list-group-item">You can see other user in: administracion/rrhh/trabajadores, and all user have password 'pass123'</li>
            <li class="list-group-item">Diferent users have diferent rols</li>
            <li class="list-group-item">I would really appreciate if you give me feedback by contacting my page: <a href="https://portfolio-mvelarde.herokuapp.com/" target="_blank">MyPortfolio</a></li>
        </ul>
    </div>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Inicia sesión</p>
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <div class="alert-text">
                    @foreach ($errors->all() as $error)
                        <span>{{ $error }}</span>
                    @endforeach
                </div>
            </div>
        @endif
      <form action="{{route('login_post')}}" method="post" autocomplete="off">
        @csrf
        <div class="input-group mb-3">
        <input type="text" name="usuario" class="form-control" value="{{old('usuario')}}" placeholder="Usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8"></div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset("assets/$theme/plugins/jquery/jquery.min.js")}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset("assets/$theme/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{asset("assets/$theme/dist/js/adminlte.js")}}"></script>
</body>
</html>
