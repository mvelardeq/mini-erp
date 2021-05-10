@extends("theme.$theme.layout")
@section('titulo')
Compras
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
                <h3 class="card-title">Lista de compras</h3>
                <div class="card-tools">
                    <a href="{{route('crear_compra')}}" class="btn btn-block btn-success btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover table-responsive-lg" id="tabla-data">
                    <thead class="bg-dark">
                        <tr>
                            <th>Fecha</th>
                            <th>proveedor</th>
                            <th>Ruc del proveedor</th>
                            <th>Total</th>
                            <th>Observación</th>

                            <th class="width70"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($compras as $compra)
                        <tr>
                            <td>{{$compra->fecha}}</td>
                            <td>
                                {{$compra->proveedor}}
                            </td>
                            <td>{{$compra->ruc_proveedor}}</td>
                            <td>{{$compra->total_con_igv}}</td>
                            <td>{{$compra->observacion}}</td>

                            <td>
                                <form action="{{route('eliminar_compra', ['id' => $compra->id])}}" class="d-inline form-eliminar" method="POST">
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
