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
                <h3 class="card-title">Categorías de los productos</h3>
                <div class="card-tools">
                    <a href="{{route('crear_categoria_producto')}}" class="btn btn-block btn-success btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover table-responsive-lg" id="tabla-data">
                    <thead class="bg-dark">
                        <tr>
                            <th>Categoría</th>

                            <th class="width70"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias_producto as $categoria_producto)
                        <tr>
                            <td>{{$categoria_producto->nombre}}</td>

                            <td>
                                <a href="{{route('editar_categoria_producto', ['id' => $categoria_producto->id])}}" class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{route('eliminar_categoria_producto', ['id' => $categoria_producto->id])}}" class="d-inline form-eliminar" method="POST">
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
