@extends("theme.$theme.layout")

@section('titulo')
    Sistema Permisos
@endsection

@section('style')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{asset("assets/$theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
  <link rel="stylesheet" href="{{asset("assets/$theme/plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}">
@endsection

@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            @include('dinamica.includes.mensaje')
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Crear Permisos</h3>
                <div class="card-tools">
                    <a href="{{route('permiso')}}" class="btn btn-block btn-info btn-sm">Listado</a>
                </div>
            </div>
            <!-- /.card-header -->
            <form action="{{route('guardar_permiso')}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off">
                @csrf
                <div class="card-body">
                    @include('dinamica.admin.permiso.form')
                </div>
                <div class="card-footer">
                        @include('dinamica.includes.boton-form-crear')
                </div>
            </form>
        </div>
        <!-- /.card -->
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset("assets/pages/scripts/admin/permiso/crear.js")}}" type="text/javascript"></script>
    <!-- DataTables -->
    <script src="{{asset("assets/$theme/plugins/datatables/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("assets/$theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
    <script src="{{asset("assets/$theme/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
    <script src="{{asset("assets/$theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script>
    <script>
        $(function () {
          $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
          });
          $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
        });
    </script>
@endsection
