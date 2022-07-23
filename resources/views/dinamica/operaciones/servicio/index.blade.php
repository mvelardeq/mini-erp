@extends("theme.$theme.layout")
@section('titulo')
Servicios
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
                <h3 class="card-title">Servicios</h3>
                <div class="card-tools">
                    <a href="{{route('crear_servicio')}}" class="btn btn-block btn-success btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover table-responsive-lg" id="tabla-data">
                    <thead class="bg-dark">
                        <tr>
                            <th>Nombre</th>
                            <th class="w-50">Actividades</th>
                            <th>Observación</th>
                            <th class="width70"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($servicios as $servicio)
                        <tr>
                            <td>{{$servicio->nombre}}</td>
                            {{-- <td>{{$servicio->actividades[0]['nombre']}}</td> --}}
                            <td>
                                <ul class="pl-3">
                                    @foreach ($servicio->actividades as $actividad)
                                        <li>{{$actividad->nombre}}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>{{$servicio->observacion}}</td>

                            <td>
                                <a href="{{route('editar_servicio', ['id' => $servicio->id])}}" class="btn-accion-tabla tooltips" title="Editar este registro">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{route('eliminar_servicio', ['id' => $servicio->id])}}" class="d-inline form-eliminar" method="POST">
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
