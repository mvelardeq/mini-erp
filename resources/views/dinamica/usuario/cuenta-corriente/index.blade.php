@extends("theme.$theme.layout")
@section('titulo')
Cuentas corriente
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
                <h3 class="card-title">Cuentas corrientes</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover table-responsive-lg" id="tabla-data">
                    <thead class="bg-dark">
                        <tr>
                            <th>Número de cuenta</th>
                            <th>Nombre</th>
                            <th>Banco</th>
                            <th>Acción</th>
                            <th>Saldo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cuentas_corrientes as $cuenta_corriente)
                            <tr>
                                <td>{{$cuenta_corriente->numero_cuenta}}</td>
                                <td>{{$cuenta_corriente->nombre}}</td>
                                <td>{{$cuenta_corriente->banco}}</td>
                                <td>
                                    <a href="{{route('transferencia_usuario',["id"=>$cuenta_corriente->id])}}" title="Transferir">
                                        <i class="fas fa-share-square text-warning"></i>
                                    </a>
                                </td>
                                <td>{{number_format($cuenta_corriente->saldo,2)}}</td>
                            </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection
