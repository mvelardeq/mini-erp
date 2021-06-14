@extends("theme.$theme.layout")
@section('titulo')
Cuenta contable
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
                <h3 class="card-title">Cuentas contables</h3>
                <div class="card-tools">
                    <a href="{{route('crear_cuenta_contable')}}" class="btn btn-block btn-success btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover table-responsive-lg" id="tabla-data">
                    <thead class="bg-dark">
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Saldo</th>
                            <th>Extra</th>

                            <th class="width70"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cuentas_contable as $cuenta_contable)
                            <tr>
                                <td>{{$cuenta_contable->codigo}}</td>
                                <td>{{$cuenta_contable->nombre}}</td>
                                <td>{{$cuenta_contable->saldo}}</td>
                                <td>
                                    @if (isset($cuenta_contable->banco))
                                        Banco: {{$cuenta_contable->banco}} <br>
                                        N° cuenta: {{$cuenta_contable->numero_cuenta}} <br>
                                        @foreach ($trabajadores as $trabajador)
                                            @if ($trabajador->id == $cuentacontable->responsable_id)
                                            Responsable: {{$trabajador->primer_nombre}} {{$trabajador->primer_apellido}}
                                            @endif
                                        @endforeach
                                    @endif
                                </td>

                                <td>
                                    <a href="{{route('editar_cuenta_contable', ['id' => $cuenta_contable->id])}}" class="btn-accion-tabla tooltips" title="Editar este registro">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{route('eliminar_cuenta_contable', ['id' => $cuenta_contable->id])}}" class="d-inline form-eliminar" method="POST">
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
