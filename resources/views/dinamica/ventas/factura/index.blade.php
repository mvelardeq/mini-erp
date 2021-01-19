@php
use Carbon\Carbon;
use Illuminate\Support\Str;
@endphp

@extends("theme.$theme.layout")
@section('titulo')
Facturas
@endsection

@section("script")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/ventas/factura/index.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('dinamica.includes.mensaje')
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Facturas</h3>
                <div class="card-tools">
                    <a href="{{route('crear_factura')}}" class="btn btn-block btn-success btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover table-responsive-lg" id="tabla-data">
                    <thead class="bg-dark">
                        <tr>
                            <th>N° factura</th>
                            <th>Contrato</th>
                            <th>Concepto</th>
                            <th>Fecha factura</th>
                            <th>Costo (sin igv)</th>
                            {{-- <th>Observación</th> --}}
                            <th>Estado</th>
                            <th>Fecha pago</th>
                            <th>Acción</th>
                            <th class="width40"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($facturas as $factura)
                        <tr>
                            <td><a href="#">{{$factura->numero}}</a></td>
                            <td>{{$factura->concepto_pago->contrato->equipo->obra->nombre}} ({{$factura->concepto_pago->contrato->equipo->oe}}) - {{$factura->concepto_pago->contrato->servicio->nombre}}</td>
                            <td>{{$factura->concepto_pago->concepto}}</td>
                            <td>{{Carbon::parse($factura->fecha_facturacion)->isoFormat('DD/MM /YYYY')}}</td>
                            <td align="right">{{number_format(($factura->concepto_pago->contrato->costo_sin_igv) * ($factura->concepto_pago->porcentaje)/100,2)}}</td>
                            {{-- <td>{{$factura->observacion}}</td> --}}
                            <td id="estado{{$factura->id}}">
                                @if ($factura->estado_factura->nombre=='Emitida')
                                    <span class="badge bg-warning">Emitida</span>
                                @elseif ($factura->estado_factura->nombre=='Por cobrar')
                                    <span class="badge bg-info">Por cobrar</span>
                                @elseif ($factura->estado_factura->nombre=='Cobrada')
                                    <span class="badge bg-success">Cobrada</span>
                                @else
                                    <span class="badge bg-danger">Anulada</span>
                                @endif
                            </td>
                            <td>
                                @if (isset($factura->fecha_pago))
                                {{Carbon::parse($factura->fecha_pago)->isoFormat('DD/MM/YYYY')}}
                                @endif
                            </td>

                            <td id="accion{{$factura->id}}">
                                <form action="{{route('procesar_factura', ['id' => $factura->id])}}" class="d-inline form-procesar" method="POST">
                                    @csrf
                                    <button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Procesar factura">
                                        <i class="fas fa-share-square text-info"></i>
                                    </button>
                                </form>
                                <form action="{{route('pagar_factura', ['id' => $factura->id])}}" class="d-inline form-pagar" method="POST">
                                    @csrf
                                    <button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Pagar factura">
                                        <i class="fas fa-money-bill-alt text-success"></i>
                                    </button>
                                </form>
                                <form action="{{route('anular_factura', ['id' => $factura->id])}}" class="d-inline form-anular" method="POST">
                                    @csrf
                                    <button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Anular factura">
                                        <i class="fas fa-calendar-times text-danger"></i>
                                    </button>
                                </form>
                            </td>

                            <td>
                                {{-- <a href="{{route('editar_factura', ['id' => $factura->id])}}" class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                    <i class="fas fa-pencil-alt"></i>
                                </a> --}}
                                <form action="{{route('eliminar_factura', ['id' => $factura->id])}}" class="d-inline form-eliminar" method="POST">
                                    @csrf @method("delete")
                                    <button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Eliminar este registro">
                                        <i class="fa fa-fw fa-trash text-danger"></i>
                                    </button>
                                </form>
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
