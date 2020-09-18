@php
use Carbon\Carbon;
@endphp
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-lightblue navbar-light">

    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-2">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      {{-- <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="{{route('login')}}" role="button">
            <p>Login</p>
          </a>
        </li>
      <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="{{route('logout')}}" role="button">
          <p>Logout</p>
        </a>
      </li> --}}


      <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <img src="{{asset("assets/$theme/dist/img/user2-160x160.jpg")}}" class="user-image" alt="User Image">
                <span class="hidden-xs">Hola, {{session()->get('nombre_trabajador') ?? 'Invitado'}} </span><i class="fas fa-angle-down"> </i>
            </a>
            <ul class="dropdown-menu bg-lightblue">
                <!-- User image -->
                <li class="user-header">
                    <img src="{{asset("assets/$theme/dist/img/user2-160x160.jpg")}}" class="img-circle" alt="User Image">
                    <p>
                    {{-- Alexander Pierce - Web Developer
                    <small>Member since Nov. 2012</small> --}}
                    {{session()->get('nombre_trabajador', 'Inivitado')}} - {{session()->get('rol_nombre', 'Guest')}}
                    @auth
                        <small>Registrado desde {{Carbon::parse(auth()->user()->created_at)->year }}</small>
                    @endauth
                    </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                    <div class="row justify-content-center align-items-center">
                        @if(session()->get("roles") && count(session()->get("roles")) > 1)
                        <div class="col-xs-12 text-center">
                            <a href="#" class="cambiar-rol btn btn-block btn-outline-warning btn-sm">Cambiar Rol</a>
                        </div>
                        @endif
                    </div>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <div class="float-left">
                    <a href="{{route('login')}}" class="btn btn-block btn-outline-info btn-sm">Login</a>
                    </div>
                    <div class="float-right">
                    <a href="{{route('logout')}}" class="btn btn-block btn-outline-info btn-sm">Salir</a>
                    </div>
                </li>
            </ul>
        </li>







      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
