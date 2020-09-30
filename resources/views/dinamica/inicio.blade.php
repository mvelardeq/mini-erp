@extends("theme.$theme.layout")
@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('dinamica.includes.mensaje')
        {{-- {{auth()->user()}} --}}
        {{-- {{session()->get('nombre_trabajador')}}
        {{dd(session()->all())}} --}}
    </div>
</div>
@endsection

