@php
use Carbon\Carbon;
use Illuminate\Support\Str;
@endphp

@extends("theme.$theme.layout")
@section('titulo')
Cotizaciones
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
                <h3 class="card-title">Cotizaciones</h3>
                <div class="card-tools">
                    <a href="{{route('crear_cotizacion')}}" class="btn btn-block btn-success btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover table-responsive-lg" id="tabla-data">
                    <thead class="bg-dark">
                        <tr>
                            <th>Número</th>
                            <th>Equipo</th>
                            <th>Resumen</th>
                            <th>Fecha</th>
                            <th>Dirigido a</th>
                            <th>PDF</th>
                            <th class="width70"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cotizaciones as $cotizacion)
                        <tr>
                            <td><a href="#">{{$cotizacion->numero}}</a></td>
                            <td>{{$cotizacion->equipo->obra->nombre}} - Asc-{{$cotizacion->equipo->numero_equipo}}</td>

                            <td>{{$cotizacion->resumen}}</td>
                            <td>{{Carbon::parse($cotizacion->fecha)->isoFormat('DD/MM/YYYY')}}</td>
                            <td>{{$cotizacion->dirigido_a}}</td>
                            <td>
                                <a href="{{Storage::disk('s3')->url('files/quotation/'.$cotizacion->pdf)}}" target="_blank"><i class="fas fa-file-pdf text-danger"></i></a>
                            </td>

                            <td>
                                <a href="{{route('editar_cotizacion', ['id' => $cotizacion->id])}}" class="btn-accion-tabla tooltips" title="Editar este registro">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{route('eliminar_cotizacion', ['id' => $cotizacion->id])}}" class="d-inline form-eliminar" method="POST">
                                    @csrf @method("delete")
                                    <button type="submit" class="btn-accion-tabla eliminar tooltips" title="Eliminar este registro">
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
