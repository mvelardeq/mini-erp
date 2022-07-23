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
            <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-home"></i> Inicio</a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-2">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Buscar" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                {{-- <img src="{{ Storage::disk('s3')->url('photos/profilePhoto/' . auth()->user()->foto . '') }}" --}}
                <img src="{{ cloudinary()->getUrl(auth()->user()->foto) }}" class="user-image" alt="User Image">
                <span class="hidden-xs">{{ session()->get('nombre_trabajador') ?? 'Invitado' }} </span><i
                    class="fas fa-angle-down"> </i>
            </a>
            <ul class="dropdown-menu bg-lightblue">
                <!-- User image -->
                <li class="user-header">
                    {{-- <img src="{{Storage::disk('s3')->url("photos/profilePhoto/".auth()->user()->foto."")}}" class="img-circle" alt="User Image"> --}}
                    <img src="{{ cloudinary()->getUrl(auth()->user()->foto) }}" class="img-circle" alt="User Image">
                    <p>
                        {{ session()->get('nombre_trabajador', 'Inivitado') }} -
                        {{ session()->get('rol_nombre', 'Guest') }}
                        @auth
                            <small>Registrado desde
                                {{ Carbon::parse(auth()->user()->created_at)->isoFormat('MMM YYYY') }}</small>
                        @endauth
                    </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body bg-white">
                    {{-- <div class=" p-3 text-center border-b-1 brc-secondary-l2">
                        <div class="btn-group btn-group-toggle px-2" data-toggle="buttons">
                            <label class="btn px-3 btn-sm btn-light btn-h-lighter-danger btn-a-danger btn-a-bold btn-a-bb2">
                                <input type="radio" name="options" id="status-offline">
                                OFFLINE
                            </label>
                            <label class="btn px-3 btn-sm btn-light btn-h-lighter-success btn-a-success btn-a-bold btn-a-bb2 active">
                                <input type="radio" name="options" id="status-online" checked="">
                                ONLINE
                            </label>
                        </div>
                    </div> --}}
                    {{-- <div class=" p-3 text-center border-b-1 brc-secondary-l2">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-outline-danger color-palette active">
                            <input type="radio" name="options" id="option1" autocomplete="off" checked> OFFLINE
                            </label>
                            <label class="btn btn-outline-success color-palette">
                            <input type="radio" name="options" id="option2" autocomplete="off"> ONLINE
                            </label>
                        </div>
                    </div> --}}
                    {{-- <div class="row justify-content-center align-items-center">
                        @if (session()->get('roles') && count(session()->get('roles')) > 1)
                        <div class="col-xs-12 text-center">
                            <a href="#" class="cambiar-rol btn btn-block btn-outline-warning btn-sm">Cambiar Rol</a>
                        </div>
                        @endif
                    </div> --}}

                    @if (session()->get('roles') && count(session()->get('roles')) > 1)
                        <div class="nav-link dropdown-item">
                            <a class="cambiar-rol mt-1" href="#">
                                <i class="far fa-clipboard text-info text-105 mr-1 w-2"></i>
                                Cambiar Rol
                            </a>
                        </div>
                    @endif

                    <div class="nav-link dropdown-item">
                        <a class="" href="{{ route('usuario_perfil') }}">
                            <i class="far fa-user text-info text-105 mr-1 w-2"></i>
                            Perfil
                        </a>
                    </div>

                    <div class="nav-link dropdown-item">
                        <a class="" href="{{ route('configurar_usuario') }}">
                            <i class="fas fa-sliders-h text-success text-105 mr-1 w-2"></i>
                            Configurar
                        </a>
                    </div>
                    <div class="dropdown-divider brc-secondary-l2"></div>

                    <div class="nav-link dropdown-item">
                        <a class="" href="{{ route('logout') }}">
                            <i class="fa fa-power-off text-orange text-105 mr-1 w-2"></i>
                            Salir
                        </a>
                    </div>
                </li>
            </ul>

        </li>

        <li class="nav-item">
            <p class="pl-4"></p>
            {{-- <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a> --}}
        </li>
    </ul>
</nav>
<!-- /.navbar -->
