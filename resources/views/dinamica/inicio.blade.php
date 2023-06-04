@php
use Carbon\Carbon;
@endphp
@extends("theme.$theme.layout")
@section('script')
    <script src="{{ asset('assets/pages/scripts/inicio.js') }}" type="text/javascript"></script>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/estilos.css') }}">
@endsection
@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            @include('dinamica.includes.mensaje')

            <div class="row">
                <div class="col-md-2 publicity hidden-md-down"></div>


                <!-- col principal-container -->
                <div class="col" id="muro">
                    <div class="card card-primary card-outline">
                        <form action="{{ route('guardar_post') }}" method="POST" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row card-body">
                                <div class="col-3">
                                    <div class="image p-0">
                                        <a href="#" class="d-inline-block mt-4 hidden-xs-down">
                                            <img src="{{ cloudinary()->getUrl(auth()->user()->foto) }}"
                                                class="rounded-circle" alt="">
                                            {{-- <img src="{{ Storage::disk('s3')->url('photos/profilePhoto/' . auth()->user()->foto) }}"
                                                class="rounded-circle" alt=""> --}}
                                        </a>
                                    </div>
                                </div>
                                <div class="col-9 p-0 m-0">
                                    <textarea name="descripcion" id="" class="form-control border-0 textarea p-3" placeholder="Publicar Mensaje"
                                        required></textarea>
                                    <div class="" id="preview" style="display:block; margin-top:20px;"></div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="file" style="display: none;" name="foto_up" id="foto"
                                    accept="image/*" />
                                <label for="foto" class="btn p-0 m-0"><i
                                        class="fa fa-image fa-2x text-success"></i></label>

                                <button class="btn btn-primary float-right" type="submit">Publicar</button>
                            </div>
                        </form>
                    </div>

                    @foreach ($posts as $post)
                        <div class="card card-widget">
                            <div class="card-header">
                                <div class="user-block">
                                    <img class="img-circle"
                                        {{-- src="{{ Storage::disk('s3')->url('photos/profilePhoto/' . $post->trabajador->foto) }}" --}}
                                        src="{{ cloudinary()->getUrl($post->trabajador->foto) }}"
                                        alt="User Image">
                                    <span class="username"><a
                                            href="{{ route('perfil-publico', ['id' => $post->trabajador->id]) }}">{{ $post->trabajador->primer_nombre . ' ' . $post->trabajador->primer_apellido }}</a></span>
                                    <span class="description">Publicado -
                                        {{ Carbon::parse($post->created_at)->diffForHumans() }}</span>
                                </div>
                                @if (canTrue('eliminar-posts'))
                                    <div class="card-tools">
                                        <form action="{{ route('eliminar_post', ['id' => $post->id]) }}"
                                            class="d-inline form-eliminar" method="POST">
                                            @csrf @method('delete')
                                            <button type="submit" class="btn-accion-tabla eliminar tooltips"
                                                title="Eliminar este registro">
                                                <i class="fa fa-trash text-danger"></i>
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body px-0 mx-0">

                                @if(!empty(cloudinary()->getUrl($post->foto)))
                                    <img class="img-fluid pad mx-auto d-block pb-2"
                                        {{-- src="{{ Storage::disk('s3')->url('photos/postPhoto/' . $post->foto) }}" --}}
                                        src="{{ cloudinary()->getUrl($post->foto) }}"
                                        alt="Photo">

                                @endif


                                <p class="px-3">{{ $post->descripcion }}</p>

                                <form
                                    class="d-inline px-3 {{ $post->likes->where('trabajador_id', auth()->user()->id)->count() == 1 ? 'form-dislike' : 'form-like' }}"
                                    data-id="{{ $post->id }}">
                                    @csrf
                                    <button type="submit"
                                        class="btn btn-default btn-sm {{ $post->likes->where('trabajador_id', auth()->user()->id)->count() == 1 ? 'text-primary' : '' }}">
                                        <i class="far fa-thumbs-up"></i> Me gusta
                                    </button>
                                </form>

                                <span class="float-right px-3 text-muted">
                                    <a href="#" class="d-inline me-gusta"
                                        data-id="{{ $post->id }}">{{ $post->likes->count() > 0 ? $post->likes->count() . ' me gusta' : '' }}</a>
                                    <a href="#bloque{{ $post->id }}" aria-expanded="false"
                                        aria-controls="bloque{{ $post->id }}" data-toggle="collapse"
                                        class="d-inline pl-2">{{ $post->comentarios->count() > 0 ? $post->comentarios->count() . ' comentario(s)' : '' }}</a>
                                </span>
                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer card-comments">
                                @foreach ($post->comentarios as $comentario)
                                    @if ($loop->index < 3)
                                        <div class="card-comment">
                                            <!-- User image -->

                                                <a
                                                    href="{{ route('perfil-publico', ['id' => $comentario->trabajador->id]) }}">
                                                    <img class="img-circle img-sm"
                                                        {{-- src="{{ Storage::disk('s3')->url('photos/profilePhoto/' . $comentario->trabajador->foto) }}" --}}
                                                        src="{{ cloudinary()->getUrl($comentario->trabajador->foto) }}"
                                                        alt="User Image">
                                                </a>

                                            <div class="comment-text">
                                                <span class="username">
                                                    {{ $comentario->trabajador->primer_nombre . ' ' . $comentario->trabajador->primer_apellido }}
                                                    <span
                                                        class="text-muted float-right">{{ Carbon::parse($comentario->created_at)->diffForHumans() }}</span>
                                                </span><!-- /.username -->
                                                {{ $comentario->contenido }}
                                            </div>
                                        </div>
                                    @endif

                                    @if ($loop->index >= 3)
                                        <div class="card-comment collapse" rol="tabpanel" aria-labelledby="heading"
                                            id="bloque{{ $post->id }}">
                                            <img class="img-circle img-sm"
                                                {{-- src="{{ Storage::disk('s3')->url('photos/profilePhoto/' . $comentario->trabajador->foto) }}" --}}
                                                src="{{ cloudinary()->getUrl($comentario->trabajador->foto) }}"
                                                alt="User Image">

                                            <div class="comment-text">
                                                <span class="username">
                                                    {{ $comentario->trabajador->primer_nombre . ' ' . $comentario->trabajador->primer_apellido }}
                                                    <span
                                                        class="text-muted float-right">{{ Carbon::parse($comentario->created_at)->diffForHumans() }}</span>
                                                </span>
                                                {{ $comentario->contenido }}
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                            <!-- /.card-footer -->
                            <div class="card-footer">
                                {{-- <form action="#" method="post"> --}}
                                <form action="{{ route('guardar_comentario', ['id' => $post->id]) }}" method="POST">
                                    @csrf
                                    <img class="img-fluid img-circle img-sm"
                                        {{-- src="{{ Storage::disk('s3')->url('photos/profilePhoto/' . auth()->user()->foto) }}" --}}
                                        src="{{ cloudinary()->getUrl(auth()->user()->foto) }}"
                                        alt="Alt Text">
                                    <!-- .img-push is used to add margin to elements next to floating images -->
                                    <div class="img-push">
                                        <input type="text" name="contenido" class="form-control form-control-sm"
                                            placeholder="Presiona enter para comentar">
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

    {{-- Modal Me gusta --}}
    <div class="modal fade" id="modalMegusta" tabindex="-1" role="dialog" aria-labelledby="modalProductopLabel"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modalProductopLabel">Les gusta esta publicación</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0 m-0">

                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
@endsection
