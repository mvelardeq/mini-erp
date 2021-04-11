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
                                <strong>{{number_format(($factura->concepto_pago->contrato->costo_sin_igv) * ($factura->concepto_pago->porcentaje)/100,2) }}</strong> <br>
                                {{number_format(($factura->concepto_pago->contrato->costo_sin_igv) * ($factura->concepto_pago->porcentaje)*0.18/100,2) }} <br>
                                {{number_format(($factura->concepto_pago->contrato->costo_sin_igv) * ($factura->concepto_pago->porcentaje)*1.18/100,2) }}
                            </td>
                            <td align="right">
                                @if (($factura->concepto_pago->contrato->costo_sin_igv) * ($factura->concepto_pago->porcentaje)*1.18/100 < 700)
                                    <strong>{{number_format(($factura->concepto_pago->contrato->costo_sin_igv) * ($factura->concepto_pago->porcentaje)*1.18/100,2) }}</strong> <br>
                                @else
                                    <strong>{{number_format(($factura->concepto_pago->contrato->costo_sin_igv) * ($factura->concepto_pago->porcentaje)*1.18*(1-$factura->concepto_pago->contrato->empresa->porcentaje_detraccion/100)/100,2) }}</strong> <br>
                                    {{number_format(($factura->concepto_pago->contrato->costo_sin_igv) * ($factura->concepto_pago->porcentaje)*1.18*($factura->concepto_pago->contrato->empresa->porcentaje_detraccion/100)/100,2) }} <br>
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
                                <div>
                                    <strong>{{$factura->pagar_factura->pago ?? '' }}</strong>
                                </div>
                                <div class="detraccion">
                                    {{($factura->detraer_factura->pago_detraccion) ?? ''}}
                                </div>
                            </td>
                            <td>
                                @if (isset($factura->pagar_factura->fecha))
                                {{Carbon::parse($factura->pagar_factura->fecha)->isoFormat('DD/MM/YYYY')}}
                                @endif
                            </td>

                            <td id="accion{{$factura->id}}">
                                <form action="{{route('procesar_factura', ['id' => $factura->id])}}" class="d-inline form-procesar" method="POST">
                                    @csrf
                                    <button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Procesar factura">
                                        <i class="fas fa-share-square text-info"></i>
                                    </button>
                                </form>

                                <form class="d-inline pagar-factura" data-id="{{$factura->id}}" data-estado="{{$factura->estado_factura->nombre}}">
                                    @csrf
                                    <button type="submit" class="btn-accion-tabla eliminar tooltipsC" data-toggle="{{($factura->estado_factura->nombre != 'Por cobrar') ? '#' : 'modal'}}" title="Pagar factura">
                                        <i class="fas fa-money-bill-alt text-success"></i>
                                    </button>
                                </form>

                                <form class="d-inline detraer-factura" data-id="{{$factura->id}}" data-estado="{{$factura->estado_factura->nombre}}">
                                    @csrf
                                    <button type="submit" class="btn-accion-tabla eliminar tooltipsC" data-toggle="{{($factura->estado_factura->nombre != 'Por cobrar') ? '#' : 'modal'}}" title="Detraer factura">
                                        <i class="fas fa-percent text-secondary"></i>
                                    </button>
                                </form>

                                <form class="d-inline anular-factura" data-id="{{$factura->id}}" data-estado="{{$factura->estado_factura->nombre}}">
                                    @csrf
                                    <button type="submit" class="btn-accion-tabla eliminar tooltipsC" data-toggle="{{($factura->estado_factura->nombre != 'Por cobrar') ? '#' : 'modal'}}" title="Anular factura">
                                        <i class="fas fa-calendar-times text-danger"></i>
                                    </button>
                                </form>

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



                    {{-- Modal Detraer --}}
                        <div class="modal fade" id="modalDetraer" tabindex="-1" role="dialog" aria-labelledby="modalDetraerLabel" aria-hidden="true">

                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalDetraerLabel">Registra la detracción</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form class="form-detraer">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="hidden" id = "modalDetraerid" name="id">
                                        <div class="form-group row">
                                            <label for="pago_detraccionModal" class="col-lg-3 col-form-label">Detracción pagada</label>
                                            <div class="col-lg-8">
                                                <input type="number" step="0.01" name="pago_detraccionModal" id="pago_detraccionModal" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fecha_detraccionModal" class="col-lg-3 col-form-label">Fecha de detracción</label>
                                            <div class="col-lg-8">
                                                <input type="date" name="fecha_detraccionModal" id="fecha_detraccionModal" class="form-control"/>
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
                                <form class="form-anular">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="hidden" id = "modalAnularid" name="id">
                                        <div class="form-group row">
                                            <label for="fecha_anulacionModal" class="col-lg-3 col-form-label">Fecha de anulación</label>
                                            <div class="col-lg-8">
                                                <input type="date" name="fecha_anulacionModal" id="fecha_anulacionModal" class="form-control"/>
                                            </div>
                                        </div>
                                            <div class="form-group row">
                                                <label for="motivo_anulacionModal" class="col-lg-3 col-form-label">Motivo de anulación</label>
                                                <div class="col-lg-8">
                                                    <textarea name="motivo_anulacionModal" id="motivo_anulacionModal" class="form-control" cols="30" rows="5"></textarea>
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
