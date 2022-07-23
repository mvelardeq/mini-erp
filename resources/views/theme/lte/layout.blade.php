<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo', 'Company Name')</title>

    {{-- <link rel="icon" type="image/x-icon" href="{{asset("assets/sb/assets/img/favicon.ico")}}" /> --}}

    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/sb/assets/img/fav/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/sb/assets/img/fav/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/sb/assets/img/fav/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/sb/assets/img/fav/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/sb/assets/img/fav/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/sb/assets/img/fav/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/sb/assets/img/fav/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/sb/assets/img/fav/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/sb/assets/img/fav/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ asset('assets/sb/assets/img/fav/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('assets/sb/assets/img/fav/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96"
        href="{{ asset('assets/sb/assets/img/fav/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('assets/sb/assets/img/fav/favicon-16x16.png') }}">
    <link rel="manifest" href=imagenes/fav/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset("assets/$theme/plugins/fontawesome-free/css/all.min.css") }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet"
        href="{{ asset("assets/$theme/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css") }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset("assets/$theme/plugins/toastr/toastr.min.css") }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset("assets/$theme/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css") }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset("assets/$theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css") }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset("assets/$theme/plugins/jqvmap/jqvmap.min.css") }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("assets/$theme/dist/css/adminlte.min.css") }}">
    {{-- folder instead of downloading all of them to reduce the load. --}}
    {{-- <link rel="stylesheet" href="{{asset("assets/$theme/dist/css/skins/_all-skins.min.css")}}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset("assets/$theme/plugins/overlayScrollbars/css/OverlayScrollbars.min.css") }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset("assets/$theme/plugins/daterangepicker/daterangepicker.css") }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset("assets/$theme/plugins/summernote/summernote-bs4.min.css") }}">
    <!-- datatable -->
    <link rel="stylesheet"
        href="{{ asset('assets/js/datatable/DataTables-1.10.23/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/datatable/Buttons-1.6.5/css/buttons.bootstrap4.min.css') }}">


    @yield('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    @cloudinaryJS
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed text-sm">
    <div class="wrapper">

        {{-- inicio navbar --}}
        @include("theme/$theme/navbar")
        {{-- fin navbar --}}

        {{-- inicio aside --}}
        @include("theme/$theme/aside")
        {{-- fin aside --}}

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    {{-- <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>E-commerce</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">E-commerce</li>
                            </ol>
                        </div>
                        </div> --}}
                </div>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    @yield('contenido')

                </div>
            </section>
            <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button"
                aria-label="Scroll to top">
                <i class="fas fa-chevron-up"></i>
            </a>
        </div>

        {{-- inicio footer --}}
        @include("theme/$theme/footer")
        {{-- fin footer --}}

        <!--Inicio de ventana modal para login con más de un rol -->
        @if (session()->get('roles') && count(session()->get('roles')) > 1)
            @csrf
            <div class="modal fade" id="modal-seleccionar-rol"
                data-rol-set="{{ empty(session()->get('rol_id')) ? 'NO' : 'SI' }}" tabindex="-1"
                data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Roles de Usuario</h4>
                        </div>
                        <div class="modal-body">
                            <p>Cuentas con mas de un Rol en la plataforma, a continuación seleccione con cual de ellos
                                desea trabajar</p>
                            @foreach (session()->get('roles') as $key => $rol)
                                <li>
                                    <a href="#" class="asignar-rol" data-rolid="{{ $rol['id'] }}"
                                        data-rolnombre="{{ $rol['nombre'] }}">
                                        {{ $rol['nombre'] }}
                                    </a>
                                </li>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>

    <!-- jQuery -->
    <script src="{{ asset("assets/$theme/plugins/jquery/jquery.min.js") }}"></script>

    <!-- Bootstrap 4 -->
    <script src="{{ asset("assets/$theme/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset("assets/$theme/plugins/sweetalert2/sweetalert2.min.js") }}"></script>
    <!-- Toastr -->
    <script src="{{ asset("assets/$theme/plugins/toastr/toastr.min.js") }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset("assets/$theme/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js") }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset("assets/$theme/dist/js/adminlte.js") }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset("assets/$theme/dist/js/demo.js") }}"></script>

    {{-- jquery validacion --}}
    <script src="{{ asset('assets/js/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-validation/localization/messages_es.min.js') }}"></script>
    <script src="{{ asset('assets/js/funciones.js') }}"></script>

    <!-- datatable -->
    <script src="{{ asset('assets/js/datatable/JSZip-2.5.0/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/pdfmake-0.1.36/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/pdfmake-0.1.36/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/DataTables-1.10.23/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/DataTables-1.10.23/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/Buttons-1.6.5/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/Buttons-1.6.5/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/Buttons-1.6.5/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/Buttons-1.6.5/js/buttons.print.min.js') }}"></script>


    @yield('scriptsPlugins')

    <script src="{{ asset('assets/js/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-validation/localization/messages_es.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/funciones.js') }}"></script>

    @yield('script')
</body>

</html>
