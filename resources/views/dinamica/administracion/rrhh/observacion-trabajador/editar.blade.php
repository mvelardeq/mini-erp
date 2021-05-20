@extends("theme.$theme.layout")
@section('titulo')
    Observacion Trabajadores
@endsection

@section("styles")
<link href="{{asset("assets/js/bootstrap-fileinput/css/fileinput.min.css")}}" rel="stylesheet" type="text/css"/>
@endsection

@section("scriptsPlugins")
<script src="{{asset("assets/js/bootstrap-fileinput/js/fileinput.min.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/js/bootstrap-fileinput/js/locales/es.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/js/bootstrap-fileinput/themes/fas/theme.min.js")}}" type="text/javascript"></script>
@endsection

@section("script")
<script src="{{asset("assets/pages/scripts/admin/observacion-trabajador/crear.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('dinamica.includes.mensaje')
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Editar Observaciones {{$data->nombre}}</h3>
                <div class="card-tools">
                    <a href="{{route('permiso')}}" class="btn btn-block btn-info btn-sm">Listado</a>
                </div>
            </div>
            <form action="{{route('actualizar_permiso', ['id' => $data->id])}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off">
                @csrf @method("put")
                <div class="card-body">
                    @include('dinamica.administracion.rrhh.observacion-trabajador.form')
                </div>
                <div class="card-footer">
                        @include('dinamica.includes.boton-form-editar')
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
