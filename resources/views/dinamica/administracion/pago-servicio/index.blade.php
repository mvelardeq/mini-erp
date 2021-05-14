@extends("theme.$theme.layout")
@section('titulo')
Pago servicio
@endsection

@section("script")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/administracion/logistica/compra/index.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('dinamica.includes.mensaje')
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Lista de pagos</h3>
                <div class="card-tools">
                    <a href="{{route('crear_pago_servicio')}}" class="btn btn-block btn-success btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover table-responsive-lg" id="tabla-data">
                    <thead class="bg-dark">
                        <tr>
                            <th>Servicio</th>
                            <th>Pago</th>
                            <th>Fecha pago</th>
                            <th>Proveedor</th>
                            <th>Ruc</th>
                            <th>Observacion</th>

                            <th class="width70"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pagos_servicio as $pago_servicio)
                            <tr>
                                <td>{{$pago_servicio->servicio_tercero->nombre}}-{{$pago_servicio->servicio_tercero->dirigido_a}}</td>
                                <td>{{$pago_servicio->pago}}</td>
                                <td>{{$pago_servicio->fecha_pago}}</td>
                                <td>{{$pago_servicio->proveedor}}</td>
                                <td>{{$pago_servicio->ruc_proveedor}}</td>
                                <td>{{$pago_servicio->observacion}}</td>

                                <td>
                                    <a href="{{route('editar_pago_servicio', ['id' => $pago_servicio->id])}}" class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{route('eliminar_pago_servicio', ['id' => $pago_servicio->id])}}" class="d-inline form-eliminar" method="POST">
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
