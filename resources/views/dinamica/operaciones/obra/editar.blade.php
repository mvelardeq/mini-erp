@extends("theme.$theme.layout")
@section('titulo')
    Obras
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
<script src="{{asset("assets/pages/scripts/admin/trabajador/crear.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('dinamica.includes.form-error')
        @include('dinamica.includes.mensaje')
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Editar Obra {{$obra->nombre}}</h3>
                <div class="card-tools">
                    <a href="{{route('obra')}}" class="btn btn-block btn-info btn-sm">
                        <i class="fa fa-fw fa-reply-all"></i> Volver al listado
                    </a>
                </div>
            </div>
            <form action="{{route('actualizar_obra', ['id' => $obra->id])}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf @method("put")
                <div class="card-body">
                    @include('dinamica.operaciones.obra.form')
                </div>
                <div class="card-footer">
                    @include('dinamica.includes.boton-form-editar')
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
