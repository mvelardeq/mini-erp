@php
    use Carbon\Carbon;
@endphp
@extends("theme.$theme.layout")
@section('titulo')
Ot
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
                <h3 class="card-title">OT's de {{auth()->user()->primer_nombre}} {{auth()->user()->primer_apellido}}</h3>
                <div class="card-tools">
                    <a href="{{route('crear_usuario_ot')}}" class="btn btn-block btn-success btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover table-responsive-lg" id="tabla-data">
                    <thead class="bg-dark">
                        <tr>
                            <th>Equipo</th>
                            <th>Fecha</th>
                            <th>Actividad-Horas</th>
                            <th>Adelanto</th>
                            <th>Descuento</th>
                            <th>Pedido</th>
                            <th>Estado</th>

                            <th class="width70"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ots as $ot)
                        <tr class="{{($ot->estado_ot->nombre=='Falta') ? 'table-danger' : ''}}">
                            <td>{{$ot->contrato->equipo->obra->nombre}} (O.E: {{$ot->contrato->equipo->oe}}) {{$ot->contrato->servicio->nombre}}</td>
                            <td>{{Carbon::parse($ot->created_at)->isoFormat('DD MMM')}}</td>
                            <td>
                                @foreach ($ot->actividades as $ot_actividad)
                                    {{$ot_actividad->nombre.': '.$ot_actividad->pivot->horas.' hrs'}}<br>
                                @endforeach
                            </td>
                            <td>{{$ot->adelanto_trabajador->pago ?? ''}}</td>
                            <td>{{$ot->descuento}}</td>
                            <td>{{$ot->pedido}}</td>
                            <td>
                                @if ($ot->estado_ot->nombre=='Aprobado')
                                    <span class="badge bg-success">Aprobado</span>
                                @elseif ($ot->estado_ot->nombre=='Pendiente')
                                    <span class="badge bg-warning">Pendiente</span>
                                @else
                                    <span class="badge bg-danger">Falta</span>
                                @endif
                            </td>

                            <td>
                                @if ($ot->estado_ot->nombre=='Pendiente')
                                    <form action="{{route('eliminar_usuario_ot', ['id' => $ot->id])}}" class="d-inline form-eliminar" method="POST">
                                        @csrf @method("delete")
                                        <button type="submit" class="btn-accion-tabla eliminar tooltips" title="Eliminar este registro">
                                            <i class="fa fa-fw fa-trash text-danger"></i>
                                        </button>
                                    </form>
                                @endif
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
