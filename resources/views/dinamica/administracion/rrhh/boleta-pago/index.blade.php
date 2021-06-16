@extends("theme.$theme.layout")
@php
use Carbon\Carbon;
@endphp
@section('titulo')
Boleta de pago
@endsection

@section("script")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/administracion/rrhh/boleta-pago/index.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('dinamica.includes.mensaje')
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Boletas de pago</h3>
                {{-- <div class="card-tools">
                    <a href="{{route('crear_cargo')}}" class="btn btn-block btn-success btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                    </a>
                </div> --}}
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover table-responsive" id="tabla-data">
                    <thead class="bg-dark">
                        <tr>
                            <th>Trabajador</th>
                                @for ($i = 1; $i <= 12; $i++)
                                    <th>{{Carbon::create($year,$i,15)->isoFormat('DD MMM')}}</th>
                                    <th>{{Carbon::create($year,$i,1)->endOfMonth()->isoFormat('DD MMM')}}</th>
                                @endfor
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trabajadores as $trabajador)
                            <tr>
                                <td>{{$trabajador->primer_nombre.' '.$trabajador->primer_apellido}}</td>

                                @for ($i = 1; $i <= 12; $i++)
                                <td id="quincena{{$trabajador->id.Carbon::create($year,$i,15)->toDateString()}}">
                                    @if (isset($equipo->quincena->periodo))
                                        <a href="{{Storage::disk('s3')->url('files/quincena/'.$equipo->plano)}}" target="_blank"><i class="fas fa-file-pdf text-danger"></i></a>
                                    @else
                                        <form action="{{route('crear_quincena_trabajador',['id'=>$trabajador->id,'periodo'=>Carbon::create($year,$i,15)->toDateString()])}}" class="d-inline subir-quincena" data-id="{{$trabajador->id.Carbon::create($year,$i,15)->toDateString()}}">
                                            @csrf
                                            <button type="submit" class="btn-accion-tabla eliminar tooltips" data-toggle="modal" title="Subir plano">
                                                <i class="fas fa-plus-circle text-success"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                                    <td id="boleta{{$trabajador->id.Carbon::create($year,$i,1)->endOfMonth()->toDateString()}}">
                                        @if (isset($equipo->boleta_pgo->periodo))
                                            <a href="{{Storage::disk('s3')->url('files/boleta_pago/'.$equipo->plano)}}" target="_blank"><i class="fas fa-file-pdf text-danger"></i></a>
                                        @else
                                            <form action="{{route('crear_boleta_trabajador',['id'=>$trabajador->id,'periodo'=>Carbon::create($year,$i,1)->endOfMonth()->toDateString()])}}" class="d-inline subir-boleta" data-id="{{$trabajador->id.Carbon::create($year,$i,1)->endOfMonth()->toDateString()}}">
                                                @csrf
                                                <button type="submit" class="btn-accion-tabla eliminar tooltips" data-toggle="modal" title="Subir plano">
                                                    <i class="fas fa-plus-circle text-success"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                @endfor
                                {{-- <td>
                                    <a href="{{route('editar_cargo', ['id' => $cargo_trabajador->id])}}" class="btn-accion-tabla tooltips" title="Editar este registro">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{route('eliminar_cargo', ['id' => $cargo_trabajador->id])}}" class="d-inline form-eliminar" method="POST">
                                        @csrf @method("delete")
                                        <button type="submit" class="btn-accion-tabla eliminar tooltips" title="Eliminar este registro">
                                            <i class="fa fa-fw fa-trash text-danger"></i>
                                        </button>
                                    </form>
                                </td> --}}
                            </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection
