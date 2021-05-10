@extends("theme.$theme.layout")
@section('titulo')
Productos
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
            {{-- <div class="card-header">
                <h3 class="card-title">Lista de productos</h3>
                <div class="card-tools">
                    <a href="{{route('crear_producto')}}" class="btn btn-block btn-success btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                    </a>
                </div>
            </div> --}}
            {{-- <div class="card-body"> --}}
                <div class="row">
                    <div class="col-12">
                      <!-- Custom Tabs -->
                      <div class="card">
                        <div class="card-header d-flex p-0">
                          <h3 class="card-title p-3">Inventario</h3>
                          <ul class="nav nav-pills ml-auto p-2">
                            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">General</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Tab 2</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Tab 3</a></li>
                          </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                          <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <table class="table table-striped table-bordered table-hover table-responsive-lg" id="tabla-data">
                                    <thead class="bg-dark">
                                        <tr>
                                            <th>Producto</th>
                                            <th>Tipo</th>
                                            <th>Categoría</th>
                                            <th>Cantidad</th>
                                            <th>Unidades</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $item)
                                            <tr>
                                                <td>{{$item->producto->descripcion}}</td>
                                                <td>
                                                    @switch($item->producto->tipo_producto->nombre)
                                                        @case('Activo común')
                                                        <span class="badge bg-primary">{{$item->producto->tipo_producto->nombre}}</span>

                                                            @break
                                                        @case('Activo particular')
                                                        <span class="badge bg-info">{{$item->producto->tipo_producto->nombre}}</span>

                                                            @break
                                                        @case('Consumible')
                                                        <span class="badge bg-warning">{{$item->producto->tipo_producto->nombre}}</span>

                                                            @break
                                                        @default
                                                        <span></span>
                                                    @endswitch

                                                </td>
                                                <td>{{$item->producto->categoria_producto->nombre}}</td>
                                                <td>{{$item->total}}</td>
                                                <td>{{$item->producto->unidades}}</td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">
                                {{-- <table class="table table-striped table-bordered table-hover table-responsive-lg" id="tabla-data">
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
                                                    @switch($producto->tipo_producto->nombre)
                                                        @case('Activo común')
                                                        <span class="badge bg-primary">{{$producto->tipo_producto->nombre}}</span>

                                                            @break
                                                        @case('Activo particular')
                                                        <span class="badge bg-info">{{$producto->tipo_producto->nombre}}</span>

                                                            @break
                                                        @case('Consumible')
                                                        <span class="badge bg-warning">{{$producto->tipo_producto->nombre}}</span>

                                                            @break
                                                        @default
                                                        <span></span>
                                                    @endswitch

                                                </td>
                                                <td>{{$producto->categoria_producto->nombre}}</td>
                                                <td>{{$producto->unidades}}</td>
                                                <td>
                                                    <img class="profile-user-img imagenproducto"
                                                    src="{{Storage::disk('s3')->url("photos/product/".$producto->foto."")}}"
                                                    alt="Foto del producto" type="button">
                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table> --}}
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_3">
                                {{-- <table class="table table-striped table-bordered table-hover table-responsive-lg" id="tabla-data">
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
                                                    @switch($producto->tipo_producto->nombre)
                                                        @case('Activo común')
                                                        <span class="badge bg-primary">{{$producto->tipo_producto->nombre}}</span>

                                                            @break
                                                        @case('Activo particular')
                                                        <span class="badge bg-info">{{$producto->tipo_producto->nombre}}</span>

                                                            @break
                                                        @case('Consumible')
                                                        <span class="badge bg-warning">{{$producto->tipo_producto->nombre}}</span>

                                                            @break
                                                        @default
                                                        <span></span>
                                                    @endswitch

                                                </td>
                                                <td>{{$producto->categoria_producto->nombre}}</td>
                                                <td>{{$producto->unidades}}</td>
                                                <td>
                                                    <img class="profile-user-img imagenproducto"
                                                    src="{{Storage::disk('s3')->url("photos/product/".$producto->foto."")}}"
                                                    alt="Foto del producto" type="button">
                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table> --}}
                            </div>
                            <!-- /.tab-pane -->
                          </div>
                          <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                      </div>
                      <!-- ./card -->
                    </div>
                    <!-- /.col -->
                  </div>

            {{-- </div> --}}
        </div>
    </div>
</div>


@endsection
