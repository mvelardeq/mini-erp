@extends("dinamica.admin.trabajador.perfilTrabajador.loyout")
@section('titulo')
    Sistema Trabajador
@endsection
@section("styles")
<link href="{{asset("assets/js/bootstrap-fileinput/css/fileinput.min.css")}}" rel="stylesheet" type="text/css"/>
@endsection

@section("scriptsPlugins")
<script src="{{asset("assets/js/bootstrap-fileinput/js/fileinput.min.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/js/bootstrap-fileinput/js/locales/es.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/js/bootstrap-fileinput/themes/fas/theme.min.js")}}" type="text/javascript"></script>
@endsection
@section('script')
<script src="{{asset("assets/pages/scripts/admin/trabajador/crear.js")}}" type="text/javascript"></script>
@endsection
@section('contenido2')

            @include('dinamica.includes.mensaje')
            <div class="card-header">
                <h3 class="card-title">Crear Observación a {{$trabajador->primer_nombre." ".$trabajador->primer_apellido}}</h3>
                <div class="card-tools">
                    <a href="{{route('trabajador_perfil', ['id' => $trabajador->id])}}" class="btn btn-block btn-info btn-sm">Volver</a>
                </div>
            </div>
            <!-- /.card-header -->
            <form action="{{route('guardar_observacion_trabajador', ['id' => $trabajador->id])}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    @include('dinamica.admin.observacion-trabajador.form')
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
