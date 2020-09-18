@extends("theme.$theme.layout")
@section('titulo')
    Sistema Menús
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/menu/crear.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('dinamica.includes.form-error')
        @include('dinamica.includes.mensaje')
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Editar Menú</h3>
                <div class="card-tools">
                    <a href="{{route('menu')}}" class="btn btn-block btn-info btn-sm">Listado</a>
                </div>
            </div>
            <form action="{{route('actualizar_menu', ['id' => $data->id])}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off">
                @csrf @method("put")
                <div class="card-body">
                    @include('dinamica.admin.menu.form')
                </div>
                <div class="card-footer">
                    @include('dinamica.includes.boton-form-editar')
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
