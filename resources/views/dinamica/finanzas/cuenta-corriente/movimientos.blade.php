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
                <h3 class="card-title">{{$movimientos->nombre}} <b>S/. {{number_format($movimientos->saldo,2)}}</b></h3>
                <div class="card-tools">
                    <a href="{{route('cuenta_corriente')}}" class="btn btn-block btn-info btn-sm">
                        <i class="fa fa-fw fa-reply-all"></i> Volver
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover table-responsive-lg" id="tabla-data">
                    <thead class="bg-dark">
                        <tr>
                            <th>Movimiento</th>
                            <th>Fecha</th>
                            <th>Importe</th>
                        </tr>
                    </thead>
                    {{-- {{dd($movimientos)}} --}}
                    <tbody>
                        @foreach ($movimientos->asientos_contables as $movimiento)
                            <tr>
                                {{-- {{dd($movimiento)}} --}}
                                <td>
                                    <a href="#">
                                        {{$movimiento->glosa}}
                                    </a>
                                </td>
                                <td>{{$movimiento->fecha}}</td>
                                @if ($movimiento->pivot->debe>0)
                                    <td>
                                        <b class="text-success">
                                            {{number_format($movimiento->pivot->debe,2)}}
                                        </b>
                                    </td>

                                @else
                                    <td>
                                        <b class="text-danger">
                                            -{{number_format($movimiento->pivot->haber,2)}}
                                        </b>
                                    </td>

                                @endif
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection
