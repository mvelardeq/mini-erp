@extends("theme.$theme.layout")
@section('titulo')
Trabajadores
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
                <h3 class="card-title">Trabajadores</h3>
                <div class="card-tools">
                    <a href="{{route('crear_trabajador')}}" class="btn btn-block btn-success btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover table-responsive-lg" id="tabla-data">
                    <thead>
                        <tr>
                            <th>Nombres y apellidos</th>
                            <th>Dni</th>
                            <th>Correo</th>
                            <th>Usuario</th>
                            <th>Roles</th>
                            <th>Periodo</th>
                            <th class="width70"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                        <tr>
                            <td><a href="{{route('trabajador_perfil', ['id' => $data->id])}}">{{$data->primer_nombre." ".$data->segundo_nombre." ".$data->primer_apellido." ".$data->segundo_apellido}}</a></td>
                            <td>{{$data->dni}}</td>
                            <td>{{$data->correo}}</td>
                            <td>{{$data->usuario}}</td>
                            <td>
                                @foreach ($data->roles as $rol)
                                    {{$loop->last ? $rol->nombre : $rol->nombre . ', '}}
                                @endforeach
                            </td>
                            <td>
                                @if (isset($data->periodos->last()->fecha_fin))
                                    <span class="badge bg-danger">Cesado</span>
                                @elseif (isset($data->periodos->last()->fecha_inicio))
                                    <span class="badge bg-success">Activo</span>
                                @else
                                    <span class="badge bg-warning">Sin contrato</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('editar_trabajador', ['id' => $data->id])}}" class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{route('eliminar_trabajador', ['id' => $data->id])}}" class="d-inline form-eliminar" method="POST">
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
