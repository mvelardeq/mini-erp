@extends("theme.$theme.layout")
@section('titulo')
OT
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
                <h3 class="card-title">Ot</h3>
                <div class="card-tools">
                    <a href="{{route('crear_ot')}}" class="btn btn-block btn-success btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover table-responsive-lg" id="tabla-data">
                    <thead class="bg-dark">
                        <tr>
                            <th>Trabajdor</th>
                            <th>Equipo</th>
                            <th>Fecha</th>
                            <th>Adelanto</th>
                            <th>Descuento</th>
                            <th>Pedido</th>
                            <th>Estado</th>

                            <th class="width70"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ots as $ot)
                        <tr>
                            <td><a href="#">{{$ot->trabajdor->primer_nombre." ".$ot->trabajdor->primer_apellido}}</a></td>
                            <td>{{$ot->contrato->equipo->obra->nombre."-".$ot->contrato->equipo->oe}}</td>
                            <td>{{$ot->fecha}}</td>
                            <td>{{$ot->adelanto}}</td>
                            <td>{{$ot->descuento}}</td>
                            <td>{{$ot->pedido}}</td>
                            <td>{{$ot->estado}}</td>

                            <td>
                                <a href="{{route('editar_ot', ['id' => $empresa->id])}}" class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{route('eliminar_ot', ['id' => $empresa->id])}}" class="d-inline form-eliminar" method="POST">
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
