@php
    use Carbon\Carbon;
@endphp
@extends("theme.$theme.layout")
@section('titulo')
OT
@endsection

@section("script")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('dinamica.includes.mensaje')
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Ot</h3>
                <div class="card-tools">
                    <a href="{{route('crear_ot')}}" class="btn btn-block btn-success btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover table-responsive-lg" id="tabla-data">
                    <thead class="bg-dark">
                        <tr>
                            <th>Trabajdor</th>
                            <th>Equipo</th>
                            <th>Fecha</th>
                            <th>Adelanto</th>
                            <th>Descuento</th>
                            <th>Actividad-Horas</th>
                            <th>Pedido</th>
                            <th>Estado</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ots as $ot)
                        <tr>
                            <td><a href="#">{{$ot->trabajador->primer_nombre." ".$ot->trabajador->primer_apellido}}</a></td>
                            <td>{{$ot->contrato->equipo->obra->nombre."-".$ot->contrato->equipo->oe}}</td>
                            <td>{{Carbon::parse($ot->fecha)->isoFormat('DD/MM/YYYY')}}</td>
                            <td>{{$ot->adelanto}}</td>
                            <td>{{$ot->descuento}}</td>
                            <td>
                                @foreach ($ot->actividades as $ot->actividad)
                                            {{$ot->actividad->nombre.': '.$ot->actividad->pivot->horas.' hrs'}}<br>
                                @endforeach
                            </td>
                            <td>{{$ot->pedido}}</td>
                            <td>
                                @switch($ot->estado_ot->nombre)
                                    @case('Aprobado')
                                    <span class="badge bg-success">Aprobado</span>
                                        @break
                                    @case('Falta')
                                    <span class="badge bg-danger">Falta</span>
                                        @break
                                    @default
                                    <span class="badge bg-warning">Pendiente</span>
                                @endswitch
                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
