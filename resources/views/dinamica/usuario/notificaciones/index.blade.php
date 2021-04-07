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
                    <a href="{{route('crear_falta_ot', ['id' => Auth()->user()->id])}}" class="btn btn-block btn-warning btn-sm">
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
                                    <td class="mailbox-attachment">{{$ot_supervisor->pedido}}</td>
                                    <td class="mailbox-date">
                                        <span id="adelanto">
                                            @if (!isset($ot_supervisor->adelanto) and ($ot_supervisor->estado_ot->nombre == 'Pendiente'))
                                                <a href="{{($ot_supervisor->estado_ot->nombre == 'Falta') ? '#' : '#modalAdelanto'}}" data-toggle="modal" data-target="#modalAdelanto">Adelanto</a>: {{$ot_supervisor->adelanto}}<br>
                                            @else
                                                Adelanto: S/.{{$ot_supervisor->adelanto}}<br>
                                            @endif
                                        </span>

                                        <span id="descuento">
                                            @if (!isset($ot_supervisor->descuento) and ($ot_supervisor->estado_ot->nombre == 'Pendiente'))
                                                <a href="{{($ot_supervisor->estado_ot->nombre == 'Falta') ? '#' : '#modalDescuento'}}" data-toggle="modal" data-target="#modalDescuento">Descuento</a>: {{$ot_supervisor->descuento}}<br>
                                            @else
                                                Descuento: S/.{{$ot_supervisor->descuento}}<br>
                                            @endif
                                        </span>
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
                <form action="{{route('adelanto_ot', ['id' => $ot_supervisor->id])}}" method="POST" class="form-adelanto" data-id ="{{$ot_supervisor->id}}">
                    @csrf
                    <div class="modal-body">
                        <label for="adelanto">Adelanto</label>
                        <input type="number" id="adelanto" name="adelanto">
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
                <form action="{{route('descuento_ot', ['id' => $ot_supervisor->id])}}" method="POST" class="form-descuento" data-id ="{{$ot_supervisor->id}}">
                    @csrf
                    <div class="modal-body">
                        <label for="descuento">Descuento</label>
                        <input type="number" id="descuento" name="descuento">
                        <label for="motivo_descuento">Motivo del descuento</label>
                        <textarea id="motivo_descuento" name="motivo_descuento" cols="30" rows="5"></textarea>
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
