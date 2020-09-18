@extends("theme.$theme.layout")

@section('titulo')
    Sistema Menús
@endsection
@section('script')
<script src="{{asset("assets/pages/scripts/admin/menu/crear.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            @include('dinamica.includes.form-error')
            @include('dinamica.includes.mensaje')
            <!-- /.card-header -->
                <div class="card card-outline card-info">
                    <div class="card-header">
                      <h3 class="card-title">Crear Menú</h3>
                      <div class="card-tools">
                          <a href="{{route('menu')}}" class="btn btn-info btn-sm pull-right">Listado</a>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('guardar_menu')}}" id="form-general" class="form-horizontal" method="post" autocomplete="off">
                        @csrf
                      <div class="card-body">
                        @include('dinamica.admin.menu.form')
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
