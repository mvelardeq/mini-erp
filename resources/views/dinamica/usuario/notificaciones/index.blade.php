@php
    use Carbon\Carbon;
@endphp
@extends("theme.$theme.layout")
@section('titulo')
Ot
@endsection

@section("script")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/usuario/notificaciones/index.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    {{-- {{dd(Carbon::now()->toDateString())}} --}}
    <div class="col-lg-12">
        @include('dinamica.includes.mensaje')
        @include('dinamica.includes.form-error')
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Notificaciones OT</h3>

                <div class="card-tools">
                    <a href="{{route('crear_falta_ot')}}" class="btn btn-block btn-warning btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Registrar Falta
                    </a>
                </div>
                <!-- /.card-tools -->
              </div>
            <div class="table-responsive mailbox-messages">
                <table class="table table-hover" id="notificaciones_ot">
                    @foreach ($ots_supervisor as $ot_supervisor)
                        <tbody>
                            {{-- {{dd($ot_supervisor)}} --}}
                            @if (($ot_supervisor->fecha == Carbon::now()->toDateString()) || ($ot_supervisor->estado_ot->nombre == 'Pendiente'))
                                <tr class="{{($ot_supervisor->estado_ot->nombre == 'Aprobado') ? 'table-success':(($ot_supervisor->estado_ot->nombre == 'Falta') ? 'table-danger' : '')}}" id="filaot{{$ot_supervisor->id}}">
                                    <td>
                                    {{$ot_supervisor->contrato->equipo->obra->nombre}} (OE:{{$ot_supervisor->contrato->equipo->oe}})
                                    </td>
                                    <td class="mailbox-star"><a href="#">{{$ot_supervisor->trabajador->primer_nombre.' '.$ot_supervisor->trabajador->primer_apellido}}</a></td>
                                    <td class="mailbox-name">{{Carbon::parse($ot_supervisor->created_at)->diffForHumans()}}</td>
                                    <td class="mailbox-subject">
                                        @foreach ($ot_supervisor->actividades as $ot_supervisor->actividad)
                                            {{$ot_supervisor->actividad->nombre.': '.$ot_supervisor->actividad->pivot->horas.' hrs'}}<br>
                                        @endforeach
                                    </td>
                                    <td class="mailbox-attachment">
                                        {{$ot_supervisor->pedido}}
                                        @if (isset($ot_supervisor->fotos) && count($ot_supervisor->fotos)>0)
                                            <br>
                                            <a href="" class="fa fa-image fa-lg text-success imagenfotos" data-id="{{$ot_supervisor->id}}" data-trabajador="{{$ot_supervisor->trabajador->primer_nombre.' '.$ot_supervisor->trabajador->primer_apellido}}" data-obra="{{$ot_supervisor->contrato->equipo->obra->nombre}} (OE:{{$ot_supervisor->contrato->equipo->oe}})"></a>
                                        @endif
                                    </td>
                                    <td class="mailbox-date" id="accion{{$ot_supervisor->id}}">

                                        <form class="d-inline adelanto" data-id="{{$ot_supervisor->id}}" data-estado="{{$ot_supervisor->id}}">
                                            @csrf
                                            @if (!isset($ot_supervisor->adelanto_trabajador->pago) and ($ot_supervisor->estado_ot->nombre == 'Pendiente'))
                                                <button type="submit" class="pl-0 btn-accion-tabla {{(isset($ot_supervisor->adelanto_trabajador->pago)) ? '' : 'text-info'}}" title="Adelanto al trabajador">
                                                    Adelanto:
                                                </button>
                                            @else
                                                <span>Adelanto:</span>
                                            @endif
                                            <span>{{(isset($ot_supervisor->adelanto_trabajador->pago)) ? (' S/.'.$ot_supervisor->adelanto_trabajador->pago) : ''}}</span><br>
                                        </form>

                                        <form class="d-inline descuento" data-id="{{$ot_supervisor->id}}" data-estado="{{$ot_supervisor->id}}">
                                            @csrf
                                            @if (!isset($ot_supervisor->descuento) and ($ot_supervisor->estado_ot->nombre == 'Pendiente'))
                                                <button type="submit" class="pl-0 btn-accion-tabla {{(isset($ot_supervisor->descuento)) ? '' : 'text-info'}}" title="Descontar al trabajador">
                                                Descuento:
                                                </button>
                                            @else
                                                <span>Descuento:</span>
                                            @endif
                                            <span>{{(isset($ot_supervisor->descuento)) ? (' S/.'.$ot_supervisor->descuento) : ''}}</span><br>
                                        </form>

                                        <form class="d-inline gastoi" data-id="{{$ot_supervisor->id}}" data-estado="{{$ot_supervisor->id}}">
                                            @csrf
                                            @if (!isset($ot_supervisor->gasto_trabajador->pago) and ($ot_supervisor->estado_ot->nombre == 'Pendiente'))
                                                <button type="submit" class="pl-0 btn-accion-tabla {{(isset($ot_supervisor->gasto_trabajador->pago)) ? '' : 'text-info'}}" title="Registrar gasto">
                                                    Gasto I:
                                                </button>
                                            @else
                                                <span>Gasto I {{(isset($ot_supervisor->gasto_trabajador->estado_gasto->nombre)&&($ot_supervisor->gasto_trabajador->estado_gasto->nombre == 'Inmediato')) ? $ot_supervisor->gasto_trabajador->tipo_gasto->nombre : ''}}:</span>
                                            @endif
                                            <span>{{(isset($ot_supervisor->gasto_trabajador->estado_gasto->nombre)&&($ot_supervisor->gasto_trabajador->estado_gasto->nombre == 'Inmediato'))? (' S/.'.$ot_supervisor->gasto_trabajador->pago) : ''}}</span><br>
                                        </form>

                                        <form class="d-inline gastom" data-id="{{$ot_supervisor->id}}" data-estado="{{$ot_supervisor->id}}">
                                            @csrf
                                            @if (!isset($ot_supervisor->gasto_trabajador->pago) and ($ot_supervisor->estado_ot->nombre == 'Pendiente'))
                                                <button type="submit" class="pl-0 btn-accion-tabla {{(isset($ot_supervisor->gasto_trabajador->pago)) ? '' : 'text-info'}}" title="Registrar gasto">
                                                    Gasto M:
                                                </button>
                                            @else
                                                <span>Gasto M {{(isset($ot_supervisor->gasto_trabajador->estado_gasto->nombre)&&($ot_supervisor->gasto_trabajador->estado_gasto->nombre == 'Mensual')) ? $ot_supervisor->gasto_trabajador->tipo_gasto->nombre : ''}}:</span>
                                            @endif
                                            <span>{{(isset($ot_supervisor->gasto_trabajador->estado_gasto->nombre)&&($ot_supervisor->gasto_trabajador->estado_gasto->nombre == 'Mensual')) ? (' S/.'.$ot_supervisor->gasto_trabajador->pago) : ''}}</span>
                                        </form>

                                    </td>
                                    <td>
                                        @if ($ot_supervisor->estado_ot->nombre == 'Pendiente')
                                            <form action="{{route('aprobar_notificacion_ot', ['id' => $ot_supervisor->id])}}" class="d-inline form-aprobar" method="POST">
                                                @csrf
                                                <button type="submit" class="btn-accion-tabla eliminar text-success" title="Aprobar OT">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>
                                        @endif
                                        <form action="{{route('eliminar_ot', ['id' => $ot_supervisor->id])}}" class="d-inline form-eliminar" method="POST">
                                            @csrf @method("delete")
                                            <button type="submit" class="btn-accion-tabla eliminar" title="Eliminar OT">
                                                <i class="fa fa-fw fa-trash text-danger"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    @endforeach
                </table>
            </div>

        </div>


        {{-- Modal Fotos OT--}}
        <div class="modal fade" id="modalFotos" tabindex="-1" role="dialog" aria-labelledby="modalFotosLabel" aria-hidden="true">

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalFotosLabel">Fotos de la OT de <span id="data-trabajador"></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h6 id="data-obra"></h6>
                        <div class="modal-body-fotos"></div>
                        {{-- <img class="imagenmodal img-fluid" src="" alt=""> --}}
                    </div>
                </div>
            </div>
        </div>



        {{-- Modal Adelanto --}}
        <div class="modal fade" id="modalAdelanto" tabindex="-1" role="dialog" aria-labelledby="modalAdelantoLabel" aria-hidden="true">

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAdelantoLabel">Registra Adelanto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-adelanto">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id = "modalAdelantoid" name="id">
                        <div class="form-group row">
                            <label for="adelantoModal" class="col-lg-3 col-form-label">Adelanto</label>
                            <div class="col-lg-8">
                                <input type="number" step="0.01" name="adelantoModal" id="adelantoModal" class="form-control"/>
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


        {{-- Modal Descuento --}}
        <div class="modal fade" id="modalDescuento" tabindex="-1" role="dialog" aria-labelledby="modalDescuentoLabel" aria-hidden="true">

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDescuentoLabel">Registra Descuento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-descuento">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id = "modalDescuentoid" name="id">
                        <div class="form-group row">
                            <label for="descuentoModal" class="col-lg-3 col-form-label">Descuento</label>
                            <div class="col-lg-8">
                                <input type="number" step="0.01" name="descuentoModal" id="descuentoModal" class="form-control"/>
                            </div>
                        </div>
                            <div class="form-group row">
                                <label for="motivo_descuentoModal" class="col-lg-3 col-form-label">Motivo del descuento</label>
                                <div class="col-lg-8">
                                    <textarea name="motivo_descuentoModal" id="motivo_descuentoModal" class="form-control" cols="30" rows="5"></textarea>
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


        {{-- Modal Gasto I--}}
        <div class="modal fade" id="modalGastoi" tabindex="-1" role="dialog" aria-labelledby="modalGastoiLabel" aria-hidden="true">

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalGastoiLabel">Registra Gasto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-gastoi">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id = "modalGastoiid" name="id">
                        <div class="form-group row">
                            <label for="tipogasto_id" class="col-lg-3 col-form-label requerido">Contrato</label>
                            <div class="col-lg-8">
                                <select name="tipogasto_id" id="tipogasto_id" class="selectpicker form-control" data-live-search="true">
                                    <option value="">Seleccione el tipo de gasto</option>
                                    @foreach($tipos_gasto as $tipo_gasto)
                                <option value="{{$tipo_gasto->id}}" {{($tipo_gasto->id==old('tipogasto_id','otro' ?? ''))?'selected':''}}>
                                        {{$tipo_gasto->nombre}}
                                    </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gastoiModal" class="col-lg-3 col-form-label">Gasto</label>
                            <div class="col-lg-8">
                                <input type="number" step="0.01" name="gastoiModal" id="gastoiModal" class="form-control"/>
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <label for="gastoModal" class="col-lg-3 col-form-label">Motivo del descuento</label>
                            <div class="col-lg-8">
                                <textarea name="gastoModal" id="gastoModal" class="form-control" cols="30" rows="5"></textarea>
                            </div>
                        </div> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
                </div>
            </div>
        </div>

        {{-- Modal Gasto M--}}
        <div class="modal fade" id="modalGastom" tabindex="-1" role="dialog" aria-labelledby="modalGastomLabel" aria-hidden="true">

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalGastomLabel">Registra Gasto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-gastom">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id = "modalGastomid" name="id">
                        <div class="form-group row">
                            <label for="tipogastom_id" class="col-lg-3 col-form-label requerido">Contrato</label>
                            <div class="col-lg-8">
                                <select name="tipogastom_id" id="tipogastom_id" class="selectpicker form-control" data-live-search="true">
                                    <option value="">Seleccione el tipo de gasto</option>
                                    @foreach($tipos_gasto as $tipo_gasto)
                                <option value="{{$tipo_gasto->id}}" {{($tipo_gasto->id==old('tipogastom_id','otro' ?? ''))?'selected':''}}>
                                        {{$tipo_gasto->nombre}}
                                    </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gastomModal" class="col-lg-3 col-form-label">Gasto</label>
                            <div class="col-lg-8">
                                <input type="number" step="0.01" name="gastomModal" id="gastomModal" class="form-control"/>
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <label for="gastoModal" class="col-lg-3 col-form-label">Motivo del descuento</label>
                            <div class="col-lg-8">
                                <textarea name="gastoModal" id="gastoModal" class="form-control" cols="30" rows="5"></textarea>
                            </div>
                        </div> --}}
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
