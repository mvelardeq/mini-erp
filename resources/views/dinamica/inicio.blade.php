@php
    use Carbon\Carbon;
@endphp
@extends("theme.$theme.layout")
@section("script")
<script src="{{asset("assets/pages/scripts/inicio.js")}}" type="text/javascript"></script>
@endsection
@section("styles")
  <link rel="stylesheet" href="{{asset('assets/css/estilos.css')}}">
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('dinamica.includes.mensaje')

        <div class="row">
            <div class="col-md-2 publicity hidden-md-down mt-3"></div>


            <!-- col principal-container -->
            <div class="col mt-1" id="muro">
                <div class="card card-primary card-outline">
                    <form action="{{route('guardar_post')}}" method="POST" autocomplete="off" enctype="multipart/form-data" >
                        @csrf
                        <div class="row card-body">
                            <div class="col-3">
                                <div class="image p-0">
                                    <a href="#" class="d-inline-block mt-4 hidden-xs-down">
                                        <img src="{{Storage::disk('s3')->url('photos/profilePhoto/'.auth()->user()->foto)}}" class="rounded-circle" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-9 p-0 m-0">
                                    <textarea name="descripcion" id="" class="form-control border-0 textarea p-3" placeholder="Publicar Mensaje" required></textarea>
                                    <div class="" id="preview" style="display:block; margin-top:20px;"></div>
                            </div>
                        </div>
                        <div class="card-footer">
                                <input type="file" style="display: none;" name="foto_up" id="foto" accept="image/*"/>
                                <label for="foto" class="btn p-0 m-0"><i class="fa fa-image fa-2x text-success"></i></label>

                                <button class="btn btn-primary float-right" type="submit">Publicar</button>
                        </div>
                    </form>
                </div>

                @foreach ($posts as $post)

                <div class="card card-widget">
                    <div class="card-header">
                      <div class="user-block">
                        <img class="img-circle" src="{{Storage::disk('s3')->url('photos/profilePhoto/'.$post->trabajador->foto)}}" alt="User Image">
                        <span class="username"><a href="#">{{$post->trabajador->primer_nombre.' '.$post->trabajador->primer_apellido}}</a></span>
                        <span class="description">Publicado - {{Carbon::parse($post->created_at)->diffForHumans()}}</span>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <img class="img-fluid pad mx-auto d-block pb-2" src="{{Storage::disk('s3')->url('photos/postPhoto/'.$post->foto)}}" alt="Photo">

                      <p>{{$post->descripcion}}</p>

                      @if ($post->likes->where('trabajador_id',auth()->user()->id)->count() == 1)
                      {{-- {{dd($post->likes->where('trabajador_id',auth()->user()->id)->count())}} --}}
                        <form action="{{route('eliminar_like', ['id' => $post->id])}}" class="d-inline form-dislike" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-default btn-sm text-primary">
                                <i class="far fa-thumbs-up"></i> Me gusta
                            </button>
                        </form>
                      @else
                        <form action="{{route('guardar_like', ['id' => $post->id])}}" class="d-inline form-like" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-default btn-sm">
                                <i class="far fa-thumbs-up"></i> Me gusta
                            </button>
                        </form>
                      @endif

                      <span class="float-right text-muted">
                          @if ($post->likes->count()==0 && $post->comentarios->count()>0)
                            {{$post->comentarios->count()}} comentarios
                          @elseif ($post->likes->count()>0 && $post->comentarios->count()==0)
                            {{$post->likes->count()}} me gusta
                          @elseif ($post->likes->count()==0 && $post->comentarios->count()==0)

                          @else
                            {{$post->likes->count()}} me gusta - {{$post->comentarios->count()}} comentarios
                          @endif
                      </span>
                    </div>

                    <a href="#bloque{{$post->id}}" class="pl-4 pb-2" aria-expanded="false" aria-controls="bloque{{$post->id}}" data-toggle="collapse">Cargar más comentarios...</a>


                    <!-- /.card-body -->
                    <div class="card-footer card-comments">
                        @foreach ($post->comentarios as $comentario)

                            @if ($loop->index<3)
                                <div class="card-comment">
                                    <!-- User image -->
                                    <img class="img-circle img-sm" src="{{Storage::disk('s3')->url('photos/profilePhoto/'.$comentario->trabajador->foto)}}" alt="User Image">

                                    <div class="comment-text">
                                        <span class="username">
                                            {{$comentario->trabajador->primer_nombre.' '.$comentario->trabajador->primer_apellido}}
                                            <span class="text-muted float-right">{{Carbon::parse($comentario->created_at)->diffForHumans()}}</span>
                                        </span><!-- /.username -->
                                        {{$comentario->contenido}}
                                    </div>
                                </div>
                            @endif

                            @if ($loop->index>=3)
                                <div class="card-comment collapse" rol="tabpanel" aria-labelledby="heading" id="bloque{{$post->id}}">
                                    <img class="img-circle img-sm" src="{{Storage::disk('s3')->url('photos/profilePhoto/'.$comentario->trabajador->foto)}}" alt="User Image">

                                    <div class="comment-text">
                                        <span class="username">
                                            {{$comentario->trabajador->primer_nombre.' '.$comentario->trabajador->primer_apellido}}
                                            <span class="text-muted float-right">{{Carbon::parse($comentario->created_at)->diffForHumans()}}</span>
                                        </span>
                                        {{$comentario->contenido}}
                                    </div>
                                </div>
                            @endif

                        @endforeach

                    </div>
                    <!-- /.card-footer -->
                    <div class="card-footer">
                      {{-- <form action="#" method="post"> --}}
                        <form action="{{route('guardar_comentario',['id'=>$post->id])}}" method="POST">
                            @csrf
                            <img class="img-fluid img-circle img-sm" src="{{Storage::disk('s3')->url('photos/profilePhoto/'.auth()->user()->foto)}}" alt="Alt Text">
                            <!-- .img-push is used to add margin to elements next to floating images -->
                            <div class="img-push">
                            <input type="text" name="contenido" class="form-control form-control-sm" placeholder="Presiona enter para comentar">
                            </div>
                        </form>
                    </div>
                    <!-- /.card-footer -->
                </div>

                @endforeach

            </div>
            <div class="col-md-3 publicity hidden-md-down mt-3"></div>
        </div>
    </div>

</div>

@endsection

