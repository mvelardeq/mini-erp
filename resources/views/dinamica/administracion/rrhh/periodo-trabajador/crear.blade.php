@extends("dinamica.admin.trabajador.perfilTrabajador.loyout")
@section('titulo')
    Sistema Trabajador
@endsection
@section('contenido2')
            @include('dinamica.includes.mensaje')
            <div class="card-header">
            <h3 class="card-title">Crear Periodo a {{$trabajador->primer_nombre." ".$trabajador->primer_apellido}}</h3>
                <div class="card-tools">
                    <a href="{{route('trabajador_perfil', ['id' => $trabajador->id])}}" class="btn btn-block btn-info btn-sm">Volver</a>
                </div>
            </div>
            <!-- /.card-header -->
            <form action="{{route('guardar_periodo_trabajador', ['id' => $trabajador->id])}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off">
                @csrf
                <div class="card-body">
                    @include('dinamica.admin.periodo-trabajador.form')
                </div>
                <div class="card-footer">
                    @include('dinamica.includes.boton-form-crear')
                </div>
            </form>
@endsection
