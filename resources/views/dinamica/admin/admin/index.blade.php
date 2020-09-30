@extends("theme.$theme.layout")
@section("titulo")
Administrador
@endsection

@section('contenido')
<div class="row">
    {{-- <div class="col-lg-12">{{dd(auth()->user()->foto)}}</div> --}}
    <div class="col-lg-12">BIENVENIDO</div>
</div>
@endsection
