@extends("theme.$theme.layout")
@section("script")
<script src="{{asset("assets/pages/scripts/inicio.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('dinamica.includes.mensaje')

        <div class="row">
            <div class="col-md-1 publicity hidden-md-down mt-3"></div>
                <!-- col principal-container -->
                <div class="col mt-4">
                    <!-- comentar -->
                    <div class="publicar mb-4">
                        <div class="row jsutify-content-center">
                            <div class="col-auto image pl-3 mr-3">
                                <a href="#" class="d-inline-block mt-4 hidden-xs-down">
                                <img src="{{Storage::disk('s3')->url('photos/profilePhoto/'.auth()->user()->foto)}}" class="rounded-circle" alt="">
                                </a>
                            </div>
                            <div class="col">
                                <form action="{{route('guardar_post')}}" method="POST" autocomplete="off" enctype="multipart/form-data" >
                                    @csrf
                                    <textarea name="descripcion" id="" class="form-control border-0 textarea p-3" placeholder="Publicar Mensaje" required></textarea>
                                    <div class="" id="preview" style="display:block; margin-top:20px;"></div>

                                    <div class="container-buttons d-flex justify-content-between">
                                        <div class="media">
                                            <input type="file" style="display: none;" name="foto_up" id="foto" accept="image/*"/>
                                            <label for="foto" class="btn"><i class="fa fa-image fa-2x text-success"></i></label>

                                            {{-- <a href="#" class="mr-3"><i class="fa fa-play"></i></a>
                                            <a href="#" class="mr-3"><i class="fa fa-music"></i></a> --}}
                                        </div>
                                        <div>
                                            <button class="text-white buttonr" type="submit">Publicar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @foreach ($posts as $post)
                        <!-- Publicacion -->
                        <div class="publicacion mb-5">
                            <div class="row">
                                <div class="col-auto image pl-3 mr-3">
                                    <a href="#">
                                        <img src="{{Storage::disk('s3')->url('photos/profilePhoto/'.$post->trabajador->foto)}}" class="rounded-circle" alt="">
                                    </a>
                                </div>
                                <div class="col">
                                    <div class="post">
                                        <a href="#" class="name d-inline-block">{{$post->trabajador->primer_nombre.' '.$post->trabajador->primer_apellido}}</a>
                                        <p class="text p-3 mb-0 text-justify">
                                        {{$post->descripcion}}
                                        </p>
                                        <div class="mb-3 pt-0 pb-5 img-container">
                                            <img src="{{Storage::disk('s3')->url('photos/postPhoto/'.$post->foto)}}" class="mt-0 mx-auto" style="max-width: 90%; display:block; margin:auto;" alt="">
                                        </div>
                                        <div class="buttons-box d-flex justify-content-between align-items-center mb-4">
                                            <button class="d-inline-block text-white border-0"><i class="fa fa-thumbs-up"></i></button>
                                            <p class="mb-0">155 <i class="fa fa-thumbs-up"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <!-- comentarios -->
                            <div class="row">
                                <div class="col-10 offset-2 mb-4 image2">
                                        <a href="#bloque1" aria-expanded="false" aria-controls="bloque1" data-toggle="collapse">Cargar Comentarios...</a>
                                        @foreach ($post->comentarios as $comentario)
                                            <!-- collapse -->
                                            <div class="collapse pt-3 pl-3" rol="tabpanel" aria-labelledby="heading" id="bloque1">
                                                <!-- respuesta 1 -->
                                                <div class="row respuestas mb-0">
                                                    <div class="col-auto">
                                                        <a href="#">
                                                        <img src="{{Storage::disk('s3')->url('photos/profilePhoto/'.$comentario->trabajador->foto)}}" class="rounded-circle" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="col">
                                                        <a href="#" class="name d-inline-block">{{$comentario->trabajador->primer_nombre.' '.$comentario->trabajador->primer_apellido}}</a>
                                                        <p class="respuesta mb-2 text-justify">{{$comentario->contenido}}</p>
                                                        {{-- <a href="#" class="respuesta">Me gusta</a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                </div>
                            </div>


                            <!-- comentar -->
                            <div class="row">
                                <div class="col-10 offset-2 image2 pl-3 mr-3">
                                <div class="row no-gutters coment">
                                    <div class="col-auto d-flex justify-content-start">
                                    <a href="#">
                                        <img src="{{Storage::disk('s3')->url('photos/profilePhoto/'.auth()->user()->foto)}}" class="rounded-circle" alt="">
                                    </a>
                                    </div>
                                    <div class="col px-3">
                                        <form action="{{route('guardar_comentario',['id'=>$post->id])}}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-11">
                                                    <textarea type="text" name="contenido" class="form-control" placeholder="Comentario" required></textarea>
                                                </div>
                                                <div class="col-1">
                                                    <button type="submit" class="mb-0 ml-0 pl-0 pb-0 btn-accion-tabla tooltipsC" title="Editar este registro"><i class="fas fa-location-arrow fa-2x text-info"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            <div class="col-md-3 publicity hidden-md-down mt-3"></div>
        </div>

    </div>
</div>
@endsection

