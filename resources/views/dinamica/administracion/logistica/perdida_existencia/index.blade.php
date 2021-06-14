@extends("theme.$theme.layout")
@section('titulo')
Perdidas
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
                <h3 class="card-title">Lista de pérdidas</h3>
                <div class="card-tools">
                        <a href="{{route('crear_perdida_comun')}}" class="btn btn-block btn-success btn-sm">
                            <i class="fa fa-fw fa-plus-circle"></i>p. común
                        </a>
                        <a href="{{route('crear_perdida_particular')}}" class="btn btn-block btn-success btn-sm">
                            <i class="fa fa-fw fa-plus-circle"></i>p. particular
                        </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover table-responsive-lg" id="tabla-data">
                    <thead class="bg-dark">
                        <tr>
                            <th>Fecha</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Unidades</th>
                            <th>Motivo</th>
                            <th>Extra</th>

                            <th class="width70"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($perdidas_existencia as $perdida_existencia)
                            <tr>
                                <td>{{$perdida_existencia->fecha}}</td>
                                <td>{{$perdida_existencia->item_compra->producto->descripcion}}</td>
                                <td>
                                    {{$perdida_existencia->cantidad}}
                                </td>
                                <td>
                                    {{$perdida_existencia->item_compra->producto->unidades}}
                                </td>

                                <td>
                                    {{$perdida_existencia->motivo}}
                                </td>
                                <td>
                                    @if ($perdida_existencia->item_compra->producto->tipo_producto->nombre == 'Activo particular')
                                        Capacidad: {{$perdida_existencia->item_compra->capacidad}}<br>
                                        Número serie: {{$perdida_existencia->item_compra->numero_serie}}<br>
                                        Marca: {{$perdida_existencia->item_compra->marca}}<br>
                                        Modelo: {{$perdida_existencia->item_compra->modelo}}<br>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('editar_perdida', ['id' => $perdida_existencia->id])}}" class="btn-accion-tabla tooltips" title="Editar este registro">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{route('eliminar_perdida', ['id' => $perdida_existencia->id])}}" class="d-inline form-eliminar" method="POST">
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


{{-- Modal Foto producto--}}
<div class="modal fade" id="modalProducto" tabindex="-1" role="dialog" aria-labelledby="modalProductoLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalProductoLabel">Imagen del producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img class="imagenmodal img-fluid" src="" alt="">
            </div>
        </div>
    </div>
</div>

@endsection
