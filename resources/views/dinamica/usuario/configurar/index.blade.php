@extends("theme.$theme.layout")
@section('titulo')
Configurar
@endsection

@section("script")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('dinamica.includes.mensaje')
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Contraseña</h3>
                <div class="card-tools">
                    <a href="{{route('crear_empresa')}}" class="btn btn-block btn-success btn-sm">
                        <i class="fas fa-pen"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <p>Contraseña actual</p>
                </div>
            </div>
        </div>
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Información de contacto</h3>
                <div class="card-tools">
                    <a href="{{route('crear_empresa')}}" class="btn btn-block btn-success btn-sm">
                        <i class="fas fa-pen"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Dirección</b> <a class="float-right">{{auth()->user()->direccion}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Botas</b> <a class="float-right">{{auth()->user()->botas}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Overol</b> <a class="float-right">{{auth()->user()->overol}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Celular</b> <a class="float-right">{{auth()->user()->celular}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Correo</b> <a class="float-right">{{auth()->user()->correo}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
