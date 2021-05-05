@extends("theme.$theme.layout")
@section('titulo')
    Productos
@endsection

@section("styles")
<link href="{{asset("assets/js/bootstrap-fileinput/css/fileinput.min.css")}}" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

@endsection

@section("scriptsPlugins")
<script src="{{asset("assets/js/bootstrap-fileinput/js/fileinput.min.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/js/bootstrap-fileinput/js/locales/es.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/js/bootstrap-fileinput/themes/fas/theme.min.js")}}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script> --}}


@endsection

@section("script")
<script src="{{asset("assets/pages/scripts/admin/trabajador/crear.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/administracion/logistica/compra/crear.js")}}" type="text/javascript"></script>

@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('dinamica.includes.form-error')
        @include('dinamica.includes.mensaje')
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Crear producto</h3>
                <div class="card-tools">
                    <a href="{{route('producto')}}" class="btn btn-block btn-info btn-sm">
                        <i class="fa fa-fw fa-reply-all"></i> Volver al listado
                    </a>
                </div>
            </div>
            <form id="form-general" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
                {{-- @csrf --}}
                {{-- <div class="card-body">
                    @include('dinamica.administracion.logistica.producto.form')
                </div>
                <div class="card-footer">
                    @include('dinamica.includes.boton-form-crear')
                </div> --}}
                <div class="card-body">
                    @include('dinamica.administracion.logistica.compra.form')

                    <table class= "table table-striped table-hover table-responsive-lg" id="table-form">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Descripción</th>
                                <th>Cantidad</th>
                                <th>Precio Unitario</th>
                                <th>Total</th>

                                <th class="width70"></th>
                            </tr>
                        </thead>
                        <tbody id="compraBody">

                        </tbody>
                        <tfoot id="compraFoot">

                        </tfoot>
                    </table>
                </div>

                <div class="card-footer ">
                    <button id="addproductc" class="btn btn-success"><i class="fa fa-fw fa-plus-circle"></i> prod. común</button>
                    <button id="addproductp" class="btn btn-success"><i class="fa fa-fw fa-plus-circle"></i> prod. particular</button>
                    {{-- <button type="reset" class="btn btn-default float-right">Cancelar</button> --}}
                </div>

            </form>
        </div>
    </div>
</div>

{{-- Modal Agregar producto común--}}
<div class="modal fade" id="modalProductoc" tabindex="-1" role="dialog" aria-labelledby="modalProductocLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalProductocLabel">Agregar producto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="form-productoc" id="formproductoc">
            {{-- @csrf --}}
            <div class="modal-body">
                <div class="form-group row">
                    <label for="productoc_id" class="col-lg-3 col-form-label requerido">Producto</label>
                    <div class="col-lg-8">
                        <select name="productoc_id" id="productoc_id" class="selectpicker form-control" data-live-search="true">
                            <option value="">Seleccione el producto</option>
                            @foreach($productosc as $productoc)
                        <option value="{{$productoc->id}}">
                                {{$productoc->descripcion}}
                            </option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="costo_con_igvcModal" class="col-lg-3 col-form-label">Costo con igv</label>
                    <div class="col-lg-8">
                        <input type="number" step="0.01" name="costo_con_igvcModal" id="costo_con_igvcModal" class="form-control"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cantidadcModal" class="col-lg-3 col-form-label">Cantidad</label>
                    <div class="col-lg-8">
                        <input type="number" step="0.01" name="cantidadcModal" id="cantidadcModal" class="form-control"/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" id="guardarc" class="btn btn-primary">Guardar</button>
            </div>
        </form>
        </div>
    </div>
</div>


{{-- Modal Agregar producto particular --}}
<div class="modal fade" id="modalProductop" tabindex="-1" role="dialog" aria-labelledby="modalProductopLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalProductopLabel">Agregar producto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="form-productop" id="formproductop">
            @csrf
            <div class="modal-body">
                <div class="form-group row">
                    <label for="productop_id" class="col-lg-3 col-form-label requerido">Contrato</label>
                    <div class="col-lg-8">
                        <select name="productop_id" id="productop_id" class="selectpicker form-control" data-live-search="true">
                            <option value="">Seleccione el producto</option>
                            @foreach($productosp as $productop)
                            <option value="{{$productop->id}}" {{($productop->id==old('productop_id','otro' ?? ''))?'selected':''}}>
                                {{$productop->descripcion}}
                            </option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="costo_con_igvpModal" class="col-lg-3 col-form-label">Costo con igv</label>
                    <div class="col-lg-8">
                        <input type="number" step="0.01" name="costo_con_igvpModal" id="costo_con_igvpModal" class="form-control"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cantidadpModal" class="col-lg-3 col-form-label">Cantidad</label>
                    <div class="col-lg-8">
                        <input type="number" step="0.01" name="cantidadpModal" id="cantidadpModal" class="form-control"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="capacidadpModal" class="col-lg-3 col-form-label">Capacidad</label>
                    <div class="col-lg-8">
                        <input type="text" name="capacidadpModal" id="capacidadpModal" class="form-control"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="numero_seriepModal" class="col-lg-3 col-form-label">Numero de serie</label>
                    <div class="col-lg-8">
                        <input type="text" name="numero_seriepModal" id="numero_seriepModal" class="form-control"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="marcapModal" class="col-lg-3 col-form-label">Marca</label>
                    <div class="col-lg-8">
                        <input type="text" name="marcapModal" id="marcapModal" class="form-control"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="modelopModal" class="col-lg-3 col-form-label">Modelo</label>
                    <div class="col-lg-8">
                        <input type="text" name="modelopModal" id="modelopModal" class="form-control"/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button id="guardarp" class="btn btn-primary">Guardar</button>
            </div>
        </form>
        </div>
    </div>
</div>

@endsection
