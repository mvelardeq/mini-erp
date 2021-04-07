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
                            <th>N° Fac.</th>
                            <th>Contrato</th>
                            <th>Concepto</th>
                            <th>Fecha factura</th>
                            <th>Facturación</th>
                            {{-- <th>Observación</th> --}}
                            <th>Por cobrar</th>
                            <th>Estado</th>
                            <th>Pago cliente</th>
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
                            <td align="right">
                                Sub: <strong>{{number_format(($factura->concepto_pago->contrato->costo_sin_igv) * ($factura->concepto_pago->porcentaje)/100,2) }}</strong> <br>
                                Igv: {{number_format(($factura->concepto_pago->contrato->costo_sin_igv) * ($factura->concepto_pago->porcentaje)*0.18/100,2) }} <br>
                                Total: {{number_format(($factura->concepto_pago->contrato->costo_sin_igv) * ($factura->concepto_pago->porcentaje)*1.18/100,2) }}
                            </td>
                            <td align="right">
                                @if (($factura->concepto_pago->contrato->costo_sin_igv) * ($factura->concepto_pago->porcentaje)*1.18/100 < 700)
                                    Pago: <strong>{{number_format(($factura->concepto_pago->contrato->costo_sin_igv) * ($factura->concepto_pago->porcentaje)*1.18/100,2) }}</strong> <br>
                                @else
                                    Pago: <strong>{{number_format(($factura->concepto_pago->contrato->costo_sin_igv) * ($factura->concepto_pago->porcentaje)*1.18*(1-$factura->concepto_pago->contrato->empresa->porcentaje_detraccion/100)/100,2) }}</strong> <br>
                                    Detr: {{number_format(($factura->concepto_pago->contrato->costo_sin_igv) * ($factura->concepto_pago->porcentaje)*1.18*($factura->concepto_pago->contrato->empresa->porcentaje_detraccion/100)/100,2) }} <br>
                                @endif
                            </td>
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
                            <td id="pagocliente{{$factura->id}}" align="right">
                                Pago: <strong>{{$factura->pago ?? '' }}</strong> <br>
                                Detr: {{($factura->pago_detraccion) ?? ''}} <br>
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
                                <form class="d-inline pagar-factura" id="{{$factura->id}}">
                                    @csrf
                                    <button type="submit" class="btn-accion-tabla eliminar tooltipsC" data-toggle="{{($factura->estado_factura->nombre != 'Por cobrar') ? '#' : 'modal'}}" title="Pagar factura">
                                        <i class="fas fa-money-bill-alt text-success"></i>
                                    </button>
                                </form>

                                {{-- <span id="pagar">
                                    <a href="{{($factura->estado_factura->nombre != 'Por cobrar') ? '#' : '#modalPagar'}}" data-toggle="{{($factura->estado_factura->nombre != 'Por cobrar') ? '#' : 'modal'}}" class="pagar-factura">
                                        <button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Pagar factura" id="{{$factura->id}}">
                                            <i class="fas fa-money-bill-alt text-success"></i>
                                        </button>
                                    </a>
                                </span> --}}

                                {{-- <form action="{{route('anular_factura', ['id' => $factura->id])}}" class="d-inline form-anular" method="POST">
                                    @csrf
                                    <button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Anular factura">
                                        <i class="fas fa-calendar-times text-danger"></i>
                                    </button>
                                </form> --}}

                                <span id="anular">
                                    <a href="{{($factura->estado_factura->nombre == 'Cobrada' or $factura->estado_factura->nombre == 'Anulada') ? '#' : '#modalAnular'}}" data-toggle="{{($factura->estado_factura->nombre == 'Cobrada' or $factura->estado_factura->nombre == 'Anulada') ? '#' : 'modal'}}" data-target="{{($factura->estado_factura->nombre == 'Cobrada' or $factura->estado_factura->nombre == 'Anulada') ? '#' : '#modalAnular'}}">
                                        <button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Anular factura">
                                            <i class="fas fa-calendar-times text-danger"></i>
                                        </button>
                                    </a>
                                </span>
                            </td>

                            <td>
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


                         {{-- Modal Pagar --}}
                         <div class="modal fade" id="modalPagar" tabindex="-1" role="dialog" aria-labelledby="modalPagarLabel" aria-hidden="true">

                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="modalPagarLabel">Registra Pago</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <form class="form-pagar">
                                        @csrf
                                        <div class="modal-body">
											<input type="hidden" id = "modalPagarid" name="id">
                                            <div class="form-group row">
                                                <label for="pago" class="col-lg-3 col-form-label">Cantidad pagada</label>
                                                <div class="col-lg-8">
                                                    <input type="number" step="0.01" name="pagoModal" id="pagoModal" class="form-control"/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="fecha_pago" class="col-lg-3 col-form-label">Fecha de pago</label>
                                                <div class="col-lg-8">
                                                    <input type="date" name="fecha_pagoModal" id="fecha_pagoModal" class="form-control"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <button id="pagarfactura" type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>



                    {{-- Modal Anular --}}
                        <div class="modal fade" id="modalAnular" tabindex="-1" role="dialog" aria-labelledby="modalAnularLabel" aria-hidden="true">

                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalAnularLabel">Registra Anulación</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{route('anular_factura', ['id' => $factura->id])}}" method="POST" class="form-anular" data-id ="{{$factura->id}}">
                                    @csrf
                                    <div class="modal-body">

                                        <div class="form-group row">
                                            <label for="fecha_anulacion" class="col-lg-3 col-form-label">Fecha de anulación</label>
                                            <div class="col-lg-8">
                                                <input type="date" name="fecha_anulacion" id="fecha_anulacion" class="form-control"/>
                                            </div>
                                        </div>
                                            <div class="form-group row">
                                                <label for="motivo_anulacion" class="col-lg-3 col-form-label">Motivo de anulación</label>
                                                <div class="col-lg-8">
                                                    <textarea name="motivo_anulacion" id="motivo_anulacion" class="form-control" cols="30" rows="5"></textarea>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>


    </div>
</div>
@endsection
