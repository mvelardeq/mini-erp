@extends("theme.$theme.layout")
@section('titulo')
Productos
@endsection

@section("script")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/administracion/logistica/compra/index.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/administracion/logistica/inventario/index.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('dinamica.includes.mensaje')
        <div class="card card-outline card-info">
                <div class="row">
                    <div class="col-12">
                      <!-- Custom Tabs -->
                        <div class="card-header d-flex p-0">
                          <h3 class="card-title p-3">Inventario</h3>
                          <ul class="nav nav-pills ml-auto p-2">
                            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">General</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">A. com.</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">A. par.</a></li>
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
                                            <th>Precio promedio</th>
                                            <th>Stock</th>
                                            <th>Unidades</th>
                                            <th>Costo Total</th>
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
                                                <td>{{$item->precio_promedio}}</td>
                                                <td>{{$item->stock}}</td>
                                                <td>{{$item->producto->unidades}}</td>
                                                <td>{{$item->precio_total}}</td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">
                                <table class="table table-striped table-bordered table-hover table-responsive-lg" id="tabla-data2">
                                    <thead class="bg-dark">
                                        <tr>
                                            <th>Producto</th>
                                            <th>Tipo</th>
                                            <th>Categoría</th>
                                            <th>Precio promedio</th>
                                            <th>Stock</th>
                                            <th>Unidades</th>
                                            <th>Costo Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items_comunes as $item)
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
                                                <td>{{$item->precio_promedio}}</td>
                                                <td>{{$item->stock}}</td>
                                                <td>{{$item->producto->unidades}}</td>
                                                <td>{{$item->precio_total}}</td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_3">
                                <table class="table table-striped table-bordered table-hover table-responsive-lg" id="tabla-data3">
                                    <thead class="bg-dark">
                                        <tr>
                                            <th>Producto</th>
                                            <th>Tipo</th>
                                            <th>Categoría</th>
                                            <th>Capacidad</th>
                                            <th>Número de Serie</th>
                                            <th>Marca</th>
                                            <th>Modelo</th>
                                            <th>Precio promedio</th>
                                            <th>Stock</th>
                                            <th>Unidades</th>
                                            <th>Costo Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items_particulares as $item)
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
                                                <td>{{$item->capacidad}}</td>
                                                <td>{{$item->numero_serie}}</td>
                                                <td>{{$item->marca}}</td>
                                                <td>{{$item->modelo}}</td>
                                                <td>{{$item->precio}}</td>
                                                <td>{{$item->stock}}</td>
                                                <td>{{$item->producto->unidades}}</td>
                                                <td>{{$item->total}}</td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.tab-pane -->
                          </div>
                          <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                      <!-- ./card -->
                    </div>
                    <!-- /.col -->
                  </div>

            {{-- </div> --}}
        </div>
    </div>
</div>


@endsection
