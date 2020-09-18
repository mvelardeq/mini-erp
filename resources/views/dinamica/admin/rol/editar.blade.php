@extends("theme.$theme.layout")
@section('titulo')
    Roles
@endsection

@section("script")
<script src="{{asset("assets/pages/scripts/admin/crear.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('dinamica.includes.form-error')
        @include('dinamica.includes.mensaje')
        <div class="card card-outline card-danger">
            <div class="card-header">
                <h3 class="card-title">Editar Rol</h3>
                <div class="card-tools">
                    <a href="{{route('rol')}}" class="btn btn-block btn-info btn-sm">
                        <i class="fa fa-fw fa-reply-all"></i> Volver al listado
                    </a>
                </div>
            </div>
            <form action="{{route('actualizar_rol', ['id' => $data->id])}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off">
                @csrf @method("put")
                <div class="card-body">
                    @include('dinamica.admin.rol.form')
                </div>
                <div class="card-footer">
                    @include('dinamica.includes.boton-form-editar')
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
