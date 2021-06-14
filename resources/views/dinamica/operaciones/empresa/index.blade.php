@extends("theme.$theme.layout")
@section('titulo')
Empresas
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
                <h3 class="card-title">Empresas</h3>
                <div class="card-tools">
                    <a href="{{route('crear_empresa')}}" class="btn btn-block btn-success btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover table-responsive-lg" id="tabla-data">
                    <thead class="bg-dark">
                        <tr>
                            <th>Razón Social</th>
                            <th>RUC</th>
                            <th>Pago (soles/hora)</th>
                            <th>Dirección</th>
                            <th>Actividad</th>
                            <th>% detracción</th>
                            <th>Observación</th>

                            <th class="width70"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($empresas as $empresa)
                        <tr>
                            <td><a href="#">{{$empresa->razon_social}}</a></td>
                            <td>{{$empresa->ruc}}</td>
                            <td>{{$empresa->pago_hora}}</td>
                            <td>{{$empresa->direccion}}</td>
                            <td>{{$empresa->actividad}}</td>
                            <td>{{$empresa->porcentaje_detraccion}}</td>
                            <td>{{$empresa->observacion}}</td>

                            <td>
                                <a href="{{route('editar_empresa', ['id' => $empresa->id])}}" class="btn-accion-tabla tooltips" title="Editar este registro">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{route('eliminar_empresa', ['id' => $empresa->id])}}" class="d-inline form-eliminar" method="POST">
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
