@php
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Ventas\Factura;
use App\Models\Finanzas\Contabilidad\Asiento_cuenta;
use App\Models\Finanzas\Contabilidad\Asiento_contable;

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
{{-- {{dd(Factura::findOrFail(20)->asiento)}} --}}
{{-- {{dd(Asiento_contable::findOrFail(20)->cuentas_contable->first())}} --}}
<div class="row">
    <div class="col-lg-12">
        @include('dinamica.includes.mensaje')
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Facturas</h3>
                <div class="card-tools">
                    {{-- <a href="{{route('crear_factura')}}" class="btn btn-block btn-success btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                    </a> --}}
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover table-responsive-lg" id="tabla-data">
                    <thead class="bg-dark">
                        <tr>
                            <th>N° Fac.</th>
                            <th>Contrato</th>
                            <th>Concepto</th>
                            <th>Fecha factura</th>
                            <th>Subtotal</th>
                            <th>IGV</th>
                            <th>Total</th>
                            <th>Estado</th>
                            <th>Pago sin detrac</th>
                            <th>Pago detrac</th>
                            <th>Fecha pago sin detrac</th>
                            <th>Fecha pago detrac</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($facturas as $factura)
                        <tr>
                            <td><a href="#">{{$factura->numero}}</a></td>
                            <td>{{$factura->concepto_pago->contrato->equipo->obra->nombre}} ({{$factura->concepto_pago->contrato->equipo->oe}}) - {{$factura->concepto_pago->contrato->servicio->nombre}}</td>
                            <td>{{$factura->concepto_pago->concepto}}</td>
                            <td>{{Carbon::parse($factura->fecha_facturacion)->isoFormat('DD/MM /YYYY')}}</td>
                            <td align="right">
                                {{number_format($factura->subtotal,2)}}
                            </td>
                            <td align="right">
                                {{number_format($factura->total_con_igv-$factura->subtotal,2)}}
                            </td>
                            <td align="right">
                                {{number_format($factura->total_con_igv,2) }}
                            </td>
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
                            <td id="pagocliente{{$factura->id}}" align="right">
                                {{$factura->pagar_factura->pago ?? '' }}
                            </td>
                            <td id="pagocliente{{$factura->id}}" align="right">
                                {{($factura->detraer_factura->pago_detraccion) ?? ''}}
                            </td>
                            <td>
                                @if (isset($factura->pagar_factura->fecha))
                                {{Carbon::parse($factura->pagar_factura->fecha)->isoFormat('DD/MM/YYYY')}}
                                @endif
                            </td>
                            <td>
                                @if (isset($factura->detraer_factura->fecha))
                                {{Carbon::parse($factura->detraer_factura->fecha)->isoFormat('DD/MM/YYYY')}}
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
