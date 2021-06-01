@extends("theme.$theme.layout")
@section('contenido')
<div class="row">
    <div class="col-lg-12">

        {{-- <h2>Hola a todos</h2> --}}
        @include('dinamica.includes.mensaje')


        <form action="{{route('guardar_imagen')}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="foto" class="col-lg-3 control-form-label">Foto</label>
                    <div class="col-lg-8">
                        <input type="file" name="foto_up" id="foto"/>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                @include('dinamica.includes.boton-form-crear')
            </div>
        </form>

        <img src="{{Storage::disk('s3')->url('photos/mfolVjh1ippk9NECcEbMybSiCuQJ0vo28Pf7YasO.jpg')}}" alt="">

        {{-- {{auth()->user()}} --}}
        {{-- {{session()->get('nombre_trabajador')}}
        {{dd(session()->all())}} --}}
    </div>
</div>
@endsection

