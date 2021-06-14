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
        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
        <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Períodos</a></li>
        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
        </ul>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content">

        <div class="tab-pane" id="settings">

                @if (isset($data->periodos->last()->fecha_fin))
                    <a class="btn btn-app bg-primary" href="{{route('crear_periodo_trabajador', ['id' => $data->id])}}">
                        <span class="badge bg-success">{{$data->periodos->count()}}</span>
                        <i class="fas fa-handshake"></i> Contratar
                    </a>
                @elseif (isset($data->periodos->last()->fecha_inicio))
                    <a class="btn btn-app bg-danger" href="{{route('fin_periodo_trabajador', ['id' => $trabajador->id])}}">
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
                    <span class="badge bg-success">300</span>
                    <i class="fas fa-tasks"></i> Observación
                </a>

                @if (isset($data->periodos->last()->fecha_fin))

                    @elseif (isset($data->periodos->last()->fecha_inicio))
                    <a class="btn btn-app bg-primary" href="{{route('crear_ascenso_trabajador', ['id' => $data->id])}}">
                        <span class="badge bg-success">300</span>
                        <i class="fas fa-arrow-alt-circle-up"></i> Ascender
                    </a>

                    @else
                @endif

        </div>
        <!-- /.tab-pane -->

        <div class="tab-pane" id="timeline">
            <!-- The timeline -->
            <div class="timeline timeline-inverse">
                <!-- timeline time label -->

            @foreach ($data->periodos->reverse() as $periodo)

                <div class="time-label">
                <span class="bg-success">
                    Período: {{Carbon::parse($periodo->fecha_inicio)->isoFormat('DD MMMM YYYY') }} - {{isset($periodo->fecha_fin) ? Carbon::parse($periodo->fecha_fin)->isoFormat('DD MMMM YYYY') : 'Actualmente' }}
                </span>
                </div>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <div>
                <i class="fas fa-envelope bg-primary"></i>

                <div class="timeline-item">
                    <span class="time"><i class="far fa-clock"></i> 12:05</span>

                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                    <div class="timeline-body">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                    weebly ning heekya handango imeem plugg dopplr jibjab, movity
                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                    quora plaxo ideeli hulu weebly balihoo...
                    </div>
                    <div class="timeline-footer">
                    <a href="#" class="btn btn-primary btn-sm">Read more</a>
                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                </div>
                </div>

            @endforeach
                <!-- END timeline item -->
                <!-- timeline item -->
                <div>
                <i class="fas fa-user bg-info"></i>

                <div class="timeline-item">
                    <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                    <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                    </h3>
                </div>
                </div>
                <!-- END timeline item -->
                <!-- timeline item -->
                <div>
                <i class="fas fa-comments bg-warning"></i>

                <div class="timeline-item">
                    <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                    <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                    <div class="timeline-body">
                    Take me to your leader!
                    Switzerland is small and neutral!
                    We are more like Germany, ambitious and misunderstood!
                    </div>
                    <div class="timeline-footer">
                    <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                    </div>
                </div>
                </div>
                <!-- END timeline item -->
                <!-- timeline time label -->
                <div class="time-label">
                <span class="bg-success">
                    3 Jan. 2014
                </span>
                </div>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <div>
                <i class="fas fa-camera bg-purple"></i>

                <div class="timeline-item">
                    <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                    <div class="timeline-body">
                    <img src="https://placehold.it/150x100" alt="...">
                    <img src="https://placehold.it/150x100" alt="...">
                    <img src="https://placehold.it/150x100" alt="...">
                    <img src="https://placehold.it/150x100" alt="...">
                    </div>
                </div>
                </div>
                <!-- END timeline item -->
                <div>
                <i class="far fa-clock bg-gray"></i>
                </div>
            </div>
        </div>
            <!-- /.tab-pane -->

        <div class="active tab-pane" id="activity">
            <div id="calendar">
                Calendario
            </div>
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
                <h6 class="modal-title" id="modalTitle"></h6>
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

