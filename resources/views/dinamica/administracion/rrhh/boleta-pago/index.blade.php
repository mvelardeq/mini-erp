@extends("theme.$theme.layout")
@php
use App\Models\Administracion\RRHH\Quincena;
use App\Models\Administracion\RRHH\BoletaPago;
use Carbon\Carbon;
@endphp
@section('titulo')
    Boleta de pago
@endsection

@section('script')
    <script src="{{ asset('assets/pages/scripts/admin/index.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/pages/scripts/administracion/rrhh/boleta-pago/index.js') }}" type="text/javascript">
    </script>
@endsection

@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            @include('dinamica.includes.mensaje')
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Boletas de pago</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover table-responsive" id="tabla-data">
                        <thead class="bg-dark">
                            <tr>
                                <th>Trabajador</th>
                                @for ($i = 1; $i <= 12; $i++)
                                    <th>{{ Carbon::create($year, $i, 15)->isoFormat('DD MMM') }}</th>
                                    <th>{{ Carbon::create($year, $i, 1)->endOfMonth()->isoFormat('DD MMM') }}</th>
                                @endfor
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trabajadores as $trabajador)
                                <tr>
                                    <td>{{ $trabajador->primer_nombre . ' ' . $trabajador->primer_apellido }}</td>

                                    @for ($i = 1; $i <= 12; $i++)
                                        <td>
                                            @if ($quincena = Quincena::where('trabajador_id',$trabajador->trabajador_id)->where('periodo',Carbon::create($year, $i, 15)->toDateString())->first())
                                                <a href="{{ Storage::disk('s3')->url('files/boleta/Quincena_' . Carbon::create($quincena->periodo)->isoFormat('MMMM_YYYY').'_'.$trabajador->primer_nombre.'_'.$trabajador->primer_apellido.'.pdf') }}"
                                                    target="_blank"><i class="fas fa-file-pdf text-danger"></i></a>
                                            @else
                                                <a
                                                    href="{{ route('crear_quincena_trabajador', ['id' => $trabajador->trabajador_id, 'periodo' => Carbon::create($year, $i, 15)->toDateString()]) }}"
                                                    class="d-inline subir-quincena">
                                                    <button type="submit" class="btn-accion-tabla eliminar tooltips"
                                                        data-toggle="modal" title="Subir plano">
                                                        <i class="fas fa-plus-circle text-success"></i>
                                                    </button>
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($boleta = BoletaPago::where('trabajador_id',$trabajador->trabajador_id)->where('periodo',Carbon::create($year, $i, 1)->endOfMonth()->toDateString())->first())
                                                <a href="{{ Storage::disk('s3')->url('files/boleta/Boleta_' . Carbon::create($boleta->periodo)->isoFormat('MMMM_YYYY').'_'.$trabajador->primer_nombre.'_'.$trabajador->primer_apellido.'.pdf') }}"
                                                    target="_blank"><i class="fas fa-file-pdf text-danger"></i></a>
                                            @else
                                                <a
                                                    href="{{ route('crear_boleta_trabajador', ['id' => $trabajador->trabajador_id,'periodo' => Carbon::create($year, $i, 1)->endOfMonth()->toDateString()]) }}"
                                                    class="d-inline subir-boleta">
                                                    <button type="submit" class="btn-accion-tabla eliminar tooltips"
                                                        data-toggle="modal" title="Subir plano">
                                                        <i class="fas fa-plus-circle text-success"></i>
                                                    </button>
                                                </a>
                                            @endif
                                        </td>
                                    @endfor
                                </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
