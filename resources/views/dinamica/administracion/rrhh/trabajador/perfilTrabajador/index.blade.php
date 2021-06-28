@php
use Carbon\Carbon;
@endphp
@extends("dinamica.administracion.rrhh.trabajador.perfilTrabajador.loyout")

@section("script")
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.2/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.2/locales-all.js"></script>
<script src="{{asset('assets/pages/scripts/administracion/rrhh/trabajador/index.js')}}"></script>
@endsection
@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.2/main.css">
@endsection


@section('contenido2')
    <div class="card-header p-2">
        <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link active" href="#actividad" data-toggle="tab">Actividades</a></li>
            <li class="nav-item"><a class="nav-link" href="#historia" data-toggle="tab">Historia</a></li>
            <li class="nav-item"><a class="nav-link" href="#acciones" data-toggle="tab">Acciones</a></li>
        </ul>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content">

        <div class="active tab-pane" id="actividad">
            <div id="calendar">

            </div>
        </div>
        <!-- /.tab-pane -->

        <div class="tab-pane" id="historia">
            <!-- The timeline -->
            <div class="timeline timeline-inverse">
                @foreach ($events as $event)
                        @switch($event['tipo'])
                        @case('contrato_trabajador')
                                    <!-- timeline time label -->
                                    <div class="time-label">
                                        <span class="bg-success">
                                            {{Carbon::parse($event['fecha'])->isoFormat('DD MMMM YYYY') }}
                                        </span>
                                    </div>
                                    <div>
                                        <i class="fas fa-handshake bg-primary"></i>
                                        <div class="timeline-item">
                                            {{-- <span class="time"><i class="far fa-clock"></i> 12:05</span> --}}
                                            <h3 class="timeline-header">Se realizó contrato al trabajdor</h3>
                                            <div class="timeline-body">
                                                Se realizó contrato con los siguientes términos: <br>
                                                Cargo: {{$event['cargo']}} <br>
                                                Sueldo: S/. {{number_format($event['pago'],2)}}
                                            </div>
                                        </div>
                                    </div>

                                    @break
                                @case('fin_periodo')
                                    <!-- timeline time label -->
                                    <div class="time-label">
                                        <span class="bg-success">
                                            {{Carbon::parse($event['fecha'])->isoFormat('DD MMMM YYYY') }}
                                        </span>
                                    </div>
                                    <div>
                                        <i class="fas fa-handshake bg-danger"></i>
                                        <div class="timeline-item">
                                            {{-- <span class="time"><i class="far fa-clock"></i> 12:05</span> --}}
                                            <h3 class="timeline-header">Se desvinculó de la empresa al trabajdor</h3>
                                            <div class="timeline-body">
                                                Se realizó la desvinculación laboral sin ninguna novedad.
                                            </div>
                                        </div>
                                    </div>
                                    @break
                                @case('observacion_trabajador')
                                    <!-- timeline time label -->
                                    <div class="time-label">
                                        <span class="bg-success">
                                            {{Carbon::parse($event['fecha'])->isoFormat('DD MMMM YYYY') }}
                                        </span>
                                    </div>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-calendar-day bg-warning"></i>

                                        <div class="timeline-item">
                                            {{-- <span class="time"><i class="far fa-clock"></i> 2 days ago</span> --}}

                                            <h3 class="timeline-header">Se le hizo una observación al trabajador</h3>

                                            <div class="timeline-body">
                                                {{$event['observacion']}}
                                                <div>
                                                    <img class="img-fluid pad mx-auto d-block pb-2" src="{{Storage::disk('s3')->url("photos/ObsPhoto/".$event['foto'])}}" alt="...">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @break
                                @case('ascenso_trabajador')
                                    <!-- timeline time label -->
                                    <div class="time-label">
                                        <span class="bg-success">
                                            {{Carbon::parse($event['fecha'])->isoFormat('DD MMMM YYYY') }}
                                        </span>
                                    </div>
                                    <div>
                                        <i class="fas fa-star bg-warning"></i>
                                        <div class="timeline-item">
                                            {{-- <span class="time"><i class="far fa-clock"></i> 12:05</span> --}}
                                            <h3 class="timeline-header">Ascenso del trabajador</h3>
                                            <div class="timeline-body">
                                                Se realiza ascenso con los siguientes términos: <br>
                                                Cargo: {{$event['cargo']}} <br>
                                                Sueldo: S/. {{number_format($event['pago'],2)}}
                                            </div>
                                        </div>
                                    </div>
                                    @break
                                @default

                            @endswitch
                    @endforeach
                    <!-- END timeline item -->
                    <div>
                        <i class="far fa-clock bg-gray"></i>
                    </div>
            </div>
        </div>


        <!-- /.tab-pane -->

        <div class="tab-pane" id="acciones">

                @if (isset($data->periodos->last()->fecha_fin))
                    <a class="btn btn-app bg-primary" href="{{route('crear_periodo_trabajador', ['id' => $data->id])}}">
                        <span class="badge bg-success">{{$data->periodos->count()}}</span>
                        <i class="fas fa-handshake"></i> Contratar
                    </a>
                @elseif (isset($data->periodos->last()->fecha_inicio))
                    <a class="btn btn-app bg-danger" href="{{route('fin_periodo_trabajador', ['id' => $data->id])}}">
                        <span class="badge bg-success">{{$data->periodos->count()-1}}</span>
                        <i class="fas fa-handshake-slash"></i> Despedir
                    </a>
                @else
                    <a class="btn btn-app bg-primary" href="{{route('crear_periodo_trabajador', ['id' => $data->id])}}">
                        <span class="badge bg-success">0</span>
                        <i class="fas fa-handshake"></i> Contratar
                    </a>
                @endif

                <a class="btn btn-app bg-warning" href="{{route('crear_observacion_trabajador', ['id' => $data->id])}}">
                    <span class="badge bg-success">{{$data->observaciones->count()}}</span>
                    <i class="fas fa-tasks"></i> Observación
                </a>

                @if (isset($data->periodos->last()->fecha_fin))

                    @elseif (isset($data->periodos->last()->fecha_inicio))
                    <a class="btn btn-app bg-primary" href="{{route('crear_ascenso_trabajador', ['id' => $data->id])}}">
                        <span class="badge bg-success">{{$data->ascensos->count()-$data->periodos->count()}}</span>
                        <i class="fas fa-arrow-alt-circle-up"></i> Ascender
                    </a>

                    @else
                @endif

        </div>
        <!-- /.tab-pane -->

        </div>
        <!-- /.tab-content -->
    </div><!-- /.card-body -->

    {{-- Modal calendario --}}
<div class="modal fade" id="modalEvent" tabindex="-1" role="dialog" aria-labelledby="modalProductopLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0 m-0" id="modalDescription">

            </div>
            {{-- <div class="modal-footer">
            </div> --}}
        </div>
    </div>
</div>
@endsection

