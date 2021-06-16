@extends("theme.$theme.layout")
@section('titulo')
    Boleta de pago
@endsection

@section("styles")
<link href="{{asset("assets/js/bootstrap-fileinput/css/fileinput.min.css")}}" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

@endsection

@section("scriptsPlugins")
<script src="{{asset("assets/js/bootstrap-fileinput/js/fileinput.min.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/js/bootstrap-fileinput/js/locales/es.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/js/bootstrap-fileinput/themes/fas/theme.min.js")}}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>

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
                <h3 class="card-title">Crear boleta</h3>
                <div class="card-tools">
                    <a href="{{route('boleta_trabajador')}}" class="btn btn-block btn-info btn-sm">
                        <i class="fa fa-fw fa-reply-all"></i> Volver al listado
                    </a>
                </div>
            </div>
            <form action="{{route('guardar_quincena_trabajador',['id'=>$trabajador->id,'periodo'=>$periodo])}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <ul class="list-group mb-3">
                                <li class="list-group-item">
                                  <b>Horas simples ({{$horas_nor->sum('horas')}} horas)</b> <a class="float-right">S/.{{$horas_nor->sum('horas')*$costo_hora}}</a>
                                </li>
                                <li class="list-group-item">
                                  <b>Horas simples 25% ({{$horas_25p->sum('horas')}} horas)</b> <a class="float-right"> S/.{{$horas_25p->sum('horas')*$costo_hora}}</a>
                                </li>
                                <li class="list-group-item">
                                  <b>Horas simples 35% ({{$horas_35p->sum('horas')}} horas)</b> <a class="float-right">S/.{{$horas_35p->sum('horas')*$costo_hora}}</a>
                                </li>
                              </ul>
                        </div>
                    </div>

                    @include('dinamica.administracion.rrhh.boleta-pago.formquincena')
                </div>
                <div class="card-footer">
                    @include('dinamica.includes.boton-form-crear')
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
