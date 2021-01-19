@php
use Carbon\Carbon;
@endphp

@extends("theme.$theme.layout")
@section('titulo')
    Perfil Trabajador
@endsection

@section("script")
<script src="{{asset("assets/pages/scripts/admin/trabajador/crear.js")}}" type="text/javascript"></script>
{{-- <script>
    function recargar(){
        document.getElementById("card-trabajador").innerHTML = "@include('dinamica.admin.periodo-trabajador.formperiodotrabajador')";
    }
</script> --}}
@endsection

@section('contenido')

<!-- Main content -->
<section class="content">
    {{-- {{dd($data->periodos->last())}} --}}
    {{-- {{dd($periodo_trabajador->last())}} --}}
    @include('dinamica.includes.mensaje')
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                     src="{{Storage::url("imagenes/fotosTrabajadores/".$data->foto."")}}"
                     alt="User profile picture">
              </div>

            <h3 class="profile-username text-center">{{$data->primer_nombre." ".$data->primer_apellido}}</h3>

              <p class="text-muted text-center">{{$ascensos->last()->cargo->nombre ?? 'Sin Contrato'}}</p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>Edad</b> <a class="float-right">{{Carbon::parse($data->fecha_nacimiento)->age}} años</a>
                </li>
                <li class="list-group-item">
                      <b>Sueldo</b> <a class="float-right">{{$ascensos->last()->sueldo ?? 'Sin Contrato'}}</a>
                </li>
                <li class="list-group-item">
                    <b>Fecha Inicio</b> <a class="float-right">
                        @if (isset($data->periodos->last()->fecha_fin))
                             Cesado
                        @elseif (isset($data->periodos->last()->fecha_inicio))
                            {{-- {{$data->periodos->last()->fecha_inicio}} --}}
                            {{Carbon::parse($data->periodos->last()->fecha_inicio)->isoFormat('DD MMMM YYYY')}}
                        @else
                            Sin contrato
                        @endif
                    </a>
                </li>
              </ul>

                @if (isset($data->periodos->last()->fecha_fin))
                    <a href="{{route('crear_periodo_trabajador', ['id' => $data->id])}}" class="btn btn-primary btn-block"><b>Contratar</b></a>

                    @elseif (isset($data->periodos->last()->fecha_inicio))
                    <a href="#" class="btn btn-primary btn-block"><b>Ascender</b></a>

                    @else
                    <a href="{{route('crear_periodo_trabajador', ['id' => $data->id])}}" class="btn btn-primary btn-block"><b>Contratar</b></a>

                @endif
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- About Me Box -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Acerca de mi</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <strong><i class="fas fa-mobile-alt mr-1"></i> Celular</strong>

                <p class="text-muted">{{$data->celular}}</p>

                <hr>

                <strong><i class="fas fa-envelope mr-1"></i> Correo</strong>

                <p class="text-muted">
                    {{$data->correo}}
                </p>

                <hr>

                <strong><i class="fas fa-id-card mr-1"></i> Dni</strong>

                <p class="text-muted">
                    {{$data->dni}}
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Ubicación</strong>

                <p class="text-muted">{{$data->direccion}}</p>

                <hr>

                <strong><i class="fas fa-birthday-cake mr-1"></i> Cumpleaños</strong>

                <p class="text-muted">
                    {{Carbon::parse($data->fecha_nacimiento)->isoFormat('Do MMMM') }}
                </p>

                <hr>

                <strong><i class="fas fa-birthday-cake mr-1"></i> Botass</strong>

                <p class="text-muted">
                    {{$data->botas}}
                </p>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card" id="card-trabajador">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Períodos</a></li>
                <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Activity</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">

                <div class="active tab-pane" id="settings">

                        @if (isset($data->periodos->last()->fecha_fin))
                            <a class="btn btn-app bg-primary" href="{{route('crear_periodo_trabajador', ['id' => $data->id])}}">
                                <span class="badge bg-success">{{$data->periodos->count()}}</span>
                                <i class="fas fa-handshake"></i> Contratar
                            </a>
                        @elseif (isset($data->periodos->last()->fecha_inicio))
                            <a class="btn btn-app bg-danger" href="{{route('crear_periodo_trabajador', ['id' => $data->id])}}">
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

                        {{-- <input type="submit" class="btn btn-primary" id="nid" value="boton" /> --}}
                        <button id="miboton">Botón</button>

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

                <div class="tab-pane" id="activity">
                  <!-- Post -->
                  <div class="post">
                    <div class="user-block">
                      <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                      <span class="username">
                        <a href="#">Jonathan Burke Jr.</a>
                        <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                      </span>
                      <span class="description">Shared publicly - 7:30 PM today</span>
                    </div>
                    <!-- /.user-block -->
                    <p>
                        @foreach ($data->roles as $rol)
                            {{$loop->last ? $rol->nombre : $rol->nombre . ', '}}
                        @endforeach
                    </p>

                    <p>
                      <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                      <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                      <span class="float-right">
                        <a href="#" class="link-black text-sm">
                          <i class="far fa-comments mr-1"></i> Comments (5)
                        </a>
                      </span>
                    </p>

                    <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                  </div>
                  <!-- /.post -->

                  <!-- Post -->
                  <div class="post clearfix">
                    <div class="user-block">
                      <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                      <span class="username">
                        <a href="#">Sarah Ross</a>
                        <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                      </span>
                      <span class="description">Sent you a message - 3 days ago</span>
                    </div>
                    <!-- /.user-block -->
                    <p>
                      Lorem ipsum represents a long-held tradition for designers,
                      typographers and the like. Some people hate it and argue for
                      its demise, but others ignore the hate as they create awesome
                      tools to help create filler text for everyone from bacon lovers
                      to Charlie Sheen fans.
                    </p>

                    <form class="form-horizontal">
                      <div class="input-group input-group-sm mb-0">
                        <input class="form-control form-control-sm" placeholder="Response">
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-danger">Send</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.post -->

                  <!-- Post -->
                  <div class="post">
                    <div class="user-block">
                      <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                      <span class="username">
                        <a href="#">Adam Jones</a>
                        <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                      </span>
                      <span class="description">Posted 5 photos - 5 days ago</span>
                    </div>
                    <!-- /.user-block -->
                    <div class="row mb-3">
                      <div class="col-sm-6">
                        <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-6">
                        <div class="row">
                          <div class="col-sm-6">
                            <img class="img-fluid mb-3" src="../../dist/img/photo2.png" alt="Photo">
                            <img class="img-fluid" src="../../dist/img/photo3.jpg" alt="Photo">
                          </div>
                          <!-- /.col -->
                          <div class="col-sm-6">
                            <img class="img-fluid mb-3" src="../../dist/img/photo4.jpg" alt="Photo">
                            <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <p>
                      <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                      <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                      <span class="float-right">
                        <a href="#" class="link-black text-sm">
                          <i class="far fa-comments mr-1"></i> Comments (5)
                        </a>
                      </span>
                    </p>

                    <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                  </div>
                  <!-- /.post -->
                </div>
                <!-- /.tab-pane -->





              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

@endsection
