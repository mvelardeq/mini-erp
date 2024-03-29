@php
use Carbon\Carbon;
@endphp
@extends("dinamica.perfil-publico.loyout")

@section('contenido2')
    <div class="card-header p-2">
        <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link active" href="#publicaciones" data-toggle="tab">Publicaciones</a></li>
        </ul>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content">

            <!-- /.tab-pane -->

            <div class="tab-pane active" id="publicaciones">
                <div id="muro">
                    @if ($posts->count() > 0)
                        @foreach ($posts as $post)
                            <div class="card card-widget">
                                <div class="card-header">
                                    <div class="user-block">
                                        <img class="img-circle"
                                            src="{{ cloudinary()->getUrl($post->trabajador->foto) }}"
                                            alt="User Image">
                                        <span class="username"><a
                                                href="{{ route('perfil-publico', ['id' => $post->trabajador->id]) }}">{{ $post->trabajador->primer_nombre . ' ' . $post->trabajador->primer_apellido }}</a></span>
                                        <span class="description">Publicado -
                                            {{ Carbon::parse($post->created_at)->diffForHumans() }}</span>
                                    </div>
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
                                                <a href="{{ route('perfil-publico', ['id' => $comentario->trabajador->id]) }}">
                                                    <img class="img-circle img-sm"
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
                    @else
                        <div>
                            <h6>El usuario aún no tiene publicaciones</h6>
                        </div>
                    @endif
                </div>
            </div>
            <!-- /.tab-pane -->

        </div>
        <!-- /.tab-content -->
    </div><!-- /.card-body -->


    {{-- Modal Me gusta --}}
<div class="modal fade" id="modalMegusta" tabindex="-1" role="dialog" aria-labelledby="modalProductopLabel" aria-hidden="true">

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
