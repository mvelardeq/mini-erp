@php
use Carbon\Carbon;
use Illuminate\Support\Str;
@endphp

@extends("theme.$theme.layout")
@section('titulo')
Contratos
@endsection

@section("script")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/ventas/contrato/index.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('dinamica.includes.mensaje')
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Contratos</h3>
                <div class="card-tools">
                    <a href="{{route('crear_contrato')}}" class="btn btn-block btn-success btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover table-responsive-lg" id="tabla-data">
                    <thead class="bg-dark">
                        <tr>
                            <th>Equipo-Servicio</th>
                            <th>Horas</th>
                            <th>Costo (sin igv)</th>
                            <th>Fecha inicio</th>
                            <th>Estado</th>
                            <th>Acción</th>
                            <th class="width70"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contratos as $contrato)
                        <tr>
                            <td><a href="#">{{$contrato->equipo->obra->nombre}} (O.E: {{$contrato->equipo->oe}}) {{$contrato->servicio->nombre}}</a></td>
                            <td>{{$contrato->horas}}</td>

                            <td align="right">{{number_format($contrato->costo_sin_igv,2)}}</td>
                            <td>{{Carbon::parse($contrato->fecha_inicio)->isoFormat('DD/MM/YYYY')}}</td>

                            <td id="estado{{$contrato->id}}">
                                @if ($contrato->estado=='Abierto')
                                    <span class="badge bg-success">Abierto</span>
                                @else
                                    <span class="badge bg-warning">Cerrado</span>
                                @endif
                            </td>

                            @if ($contrato->estado=='abierto')
                                <td>
                                    <form action="{{route('finalizar_contrato', ['id' => $contrato->id])}}" class="d-inline form-finalizar" method="POST">
                                        @csrf
                                        <button id="accion{{$contrato->id}}" type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Finalizar contrato">
                                            {{-- <i class="fa fa-flag-checkered"></i> --}}
                                            Finalizar
                                        </button>
                                    </form>
                                </td>
                            @else
                                <td>
                                    <form action="{{route('retomar_contrato', ['id' => $contrato->id])}}" class="d-inline form-retomar" method="POST">
                                        @csrf
                                        <button id="accion{{$contrato->id}}" type="submit" class="btn-accion-tabla tooltipsC" title="Retomar contrato">
                                            {{-- <i class="fa fa-hourglass-start text-danger"></i> --}}
                                            Retomar
                                        </button>
                                    </form>
                                </td>
                            @endif

                            <td>
                                <a href="{{route('editar_contrato', ['id' => $contrato->id])}}" class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{route('eliminar_contrato', ['id' => $contrato->id])}}" class="d-inline form-eliminar" method="POST">
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
