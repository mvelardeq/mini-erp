@extends("theme.$theme.layout")
@php
use Carbon\Carbon;
@endphp
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
                <h3 class="card-title">Crear boleta - {{$trabajador->primer_nombre.' '.$trabajador->primer_apellido}}</h3>
                <div class="card-tools">
                    <a href="{{route('boleta_trabajador')}}" class="btn btn-block btn-info btn-sm">
                        <i class="fa fa-fw fa-reply-all"></i> Volver
                    </a>
                </div>
            </div>

            @if (!$tecnico)
                <form action="{{ route('guardar_boleta_trabajador', ['id' => $trabajador->id, 'periodo' => $periodo]) }}"
                    class="form-horizontal" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Periodo</label>
                            <div class="col-lg-8">
                                <ul class="list-group">
                                    <a>Fin mes {{Carbon::create($periodo)->isoFormat('MMMM YYYY')}}</a>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Información</label>
                            <div class="col-lg-8">
                                <ul class="list-group mb-3">
                                    <li class="list-group-item bg-success">
                                        <b>Sueldo Básico</b> <b
                                            class="float-right">S/.{{ number_format($costo_hora * 8 * 30, 2) }}</b>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pago" class="col-lg-3 col-form-label">Pago boleta</label>
                            <div class="col-lg-8">
                                <input type="text" name="pago" id="pago" class="form-control"
                                    value="{{ number_format(30*$costo_hora*8,2) }}" />
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        @include('dinamica.includes.boton-form-crear')
                    </div>
                </form>
            @else

                @if ($dias_noc->count()>0)
                <form action="{{route('guardar_boleta_trabajador',['id'=>$trabajador->id,'periodo'=>$periodo])}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Periodo</label>
                            <div class="col-lg-8">
                                <ul class="list-group">
                                    <a>Fin mes {{Carbon::create($periodo)->isoFormat('MMMM YYYY')}}</a>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Información</label>
                            <div class="col-lg-8">
                                <ul class="list-group mb-3">
                                        <li class="list-group-item bg-success">
                                            <b>Sueldo Básico</b> <b class="float-right">S/.{{number_format($costo_hora*8*30,2)}}</b>
                                        </li>
                                        <li class="list-group-item">
                                            <b class="text-muted">Dias considerados ({{$dias_tra+$numeros_domingo+$faltas->count()}} dias)</b> <a class="float-right">S/.{{number_format(($dias_tra+$numeros_domingo+$faltas->count())*$costo_hora*8,2)}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b class="text-muted">Horas al 25% ({{$horas_25p->sum('horas')}} horas)</b> <a class="float-right"> S/.{{number_format($horas_25p->sum('horas')*$costo_hora*1.25,2)}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b class="text-muted">Horas al 35% ({{$horas_35p->sum('horas')}} horas)</b> <a class="float-right">S/.{{number_format($horas_35p->sum('horas')*$costo_hora*1.35,2)}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b class="text-muted">Horas doble ({{$horas_dob->sum('horas')}} horas)</b> <a class="float-right">S/.{{number_format($horas_dob->sum('horas')*$costo_hora*2,2)}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b class="text-muted">Gastos</b> <a class="float-right">S/.{{number_format($gastos->sum('pago'),2)}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b class="text-muted">Adelantos</b> <a class="float-right">S/.{{number_format($adelantos->sum('pago'),2)}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b class="text-muted">Descuentos</b> <a class="float-right">S/.{{number_format($descuentos,2)}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b class="text-muted">Faltas</b> <a class="float-right">S/.{{number_format($faltas->count()*$costo_hora*8,2)}}</a>
                                        </li>
                                </ul>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nombre" class="col-lg-3 col-form-label">Pago quincena</label>
                            <div class="col-lg-8">
                                <input type="text" name="nombre" id="nombre" class="form-control" value="{{number_format(($dias_tra+$numeros_domingo)*$costo_hora*8+$horas_25p->sum('horas')*$costo_hora*1.25+$horas_35p->sum('horas')*$costo_hora*1.35+$horas_dob->sum('horas')*$costo_hora*2+$gastos->sum('pago')-$adelantos->sum('pago')-$descuentos,2)}}"/>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        @include('dinamica.includes.boton-form-crear')
                    </div>
                </form>
                @else
                <form action="{{route('guardar_quincena_trabajador',['id'=>$trabajador->id,'periodo'=>$periodo])}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Periodo</label>
                            <div class="col-lg-8">
                                <ul class="list-group">
                                    <a>Fin mes {{Carbon::create($periodo)->isoFormat('MMMM YYYY')}}</a>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Información</label>
                            <div class="col-lg-8">
                                <ul class="list-group mb-3">
                                        <li class="list-group-item bg-success">
                                            <b>Sueldo Básico</b> <b class="float-right">S/.{{number_format($costo_hora*8*30,2)}}</b>
                                        </li>
                                        <li class="list-group-item">
                                            <b class="text-muted">Horas al 25% ({{$horas_25p->sum('horas')}} horas)</b> <a class="float-right"> S/.{{number_format($horas_25p->sum('horas')*$costo_hora*1.25,2)}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b class="text-muted">Horas al 35% ({{$horas_35p->sum('horas')}} horas)</b> <a class="float-right">S/.{{number_format($horas_35p->sum('horas')*$costo_hora*1.35,2)}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b class="text-muted">Horas doble ({{$horas_dob->sum('horas')}} horas)</b> <a class="float-right">S/.{{number_format($horas_dob->sum('horas')*$costo_hora*2,2)}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b class="text-muted">Gastos</b> <a class="float-right">S/.{{number_format($gastos->sum('pago'),2)}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b class="text-muted">Adelantos</b> <a class="float-right">S/.{{number_format($adelantos->sum('pago'),2)}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b class="text-muted">Descuentos</b> <a class="float-right">S/.{{number_format($descuentos,2)}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b class="text-muted">Faltas</b> <a class="float-right">S/.{{number_format($faltas->count()*$costo_hora*8,2)}}</a>
                                        </li>
                                </ul>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nombre" class="col-lg-3 col-form-label">Pago boleta</label>
                            <div class="col-lg-8">
                                <input type="text" name="nombre" id="nombre" class="form-control" value="{{number_format($costo_hora*8*30+$horas_25p->sum('horas')*$costo_hora*1.25+$horas_35p->sum('horas')*$costo_hora*1.35+$horas_dob->sum('horas')*$costo_hora*2+$gastos->sum('pago')-$adelantos->sum('pago')-$descuentos-$faltas->count()*$costo_hora*8,2)}}"/>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        @include('dinamica.includes.boton-form-crear')
                    </div>
                </form>
                @endif

            @endif


        </div>
    </div>
</div>
@endsection
