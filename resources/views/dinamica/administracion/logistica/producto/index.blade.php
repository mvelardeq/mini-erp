@extends("theme.$theme.layout")
@section('titulo')
Productos
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
                <h3 class="card-title">Lista de productos</h3>
                <div class="card-tools">
                    <a href="{{route('crear_producto')}}" class="btn btn-block btn-success btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover table-responsive-lg" id="tabla-data">
                    <thead class="bg-dark">
                        <tr>
                            <th>Producto</th>
                            <th>Tipo</th>
                            <th>Categoría</th>
                            <th>Unidades</th>
                            <th>Foto</th>

                            <th class="width70"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto)
                        <tr>
                            <td>{{$producto->descripcion}}</td>
                            <td>
                                @if ($producto->tipo_producto->nombre == 'Activo')
                                    <span class="badge bg-primary">{{$producto->tipo_producto->nombre}}</span>
                                @else
                                    <span class="badge bg-warning">{{$producto->tipo_producto->nombre}}</span>
                                @endif
                            </td>
                            <td>{{$producto->categoria_producto->nombre}}</td>
                            <td>{{$producto->unidades}}</td>
                            <td>
                                <img class="profile-user-img"
                                src="{{Storage::disk('s3')->url("photos/product/".$producto->foto."")}}"
                                alt="Foto del producto">
                            </td>

                            <td>
                                <a href="{{route('editar_producto', ['id' => $producto->id])}}" class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{route('eliminar_producto', ['id' => $producto->id])}}" class="d-inline form-eliminar" method="POST">
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
