@extends("theme.$theme.layout")
@section('titulo')
Equipos
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
                <h3 class="card-title">Equipos</h3>
                <div class="card-tools">
                    <a href="{{route('crear_equipo')}}" class="btn btn-block btn-success btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                    </a>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-bordered table-hover table-responsive-lg" id="tabla-data">
                    <thead class="bg-dark">
                        <tr>
                            <th>N° de equipo</th>
                            <th>Obra</th>
                            <th>OE</th>
                            <th>Velocidad (m/s)</th>
                            <th>Paradas</th>
                            <th>Carga (kg)</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Accesos</th>
                            <th>Cuarto de máq.</th>

                            <th class="width70"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($equipos as $equipo)
                        <tr>
                            <td><a href="#">Asc-{{$equipo->numero_equipo}}</a></td>
                            <td>{{$equipo->obra->nombre}}</td>
                            <td>{{$equipo->oe}}</td>
                            <td>{{$equipo->velocidad}}</td>
                            <td>{{$equipo->paradas}}</td>
                            <td>{{$equipo->carga}}</td>
                            <td>{{$equipo->marca}}</td>
                            <td>{{$equipo->modelo}}</td>
                            <td>{{$equipo->accesos}}</td>
                            <td>{{$equipo->cuarto_maquina}}</td>

                            <td>
                                <a href="{{route('editar_equipo', ['id' => $equipo->id])}}" class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{route('eliminar_equipo', ['id' => $equipo->id])}}" class="d-inline form-eliminar" method="POST">
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
