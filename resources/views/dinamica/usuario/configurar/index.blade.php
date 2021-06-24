@extends("theme.$theme.layout")
@section('titulo')
Configurar
@endsection

@section("script")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/usuario/configurar/index.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('dinamica.includes.mensaje')
        <div id="mensaje"></div>
        {{-- <div class="alert alert-success" style="display:none"></div> --}}
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Contraseña</h3>
                <div class="card-tools">
                    <b class="btn btn-block btn-success btn-sm" id="botonModalContrasenia" title="Cambiar contraseña">
                        <i class="fas fa-pen"></i>
                    </b>
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
                    <b href="{{route('crear_empresa')}}" class="btn btn-block btn-success btn-sm">
                        <i class="fas fa-pen"></i>
                    </b>
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


{{-- Modal Agregar producto común--}}
<div class="modal fade" id="modalCambioContrasenia" tabindex="-1" role="dialog" aria-labelledby="modalCambioContraseniaLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCambioContraseniaLabel">Cambiar contraseña</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-password" id="formproductoc">
                @csrf
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>

                    <div class="form-group row">
                        <label for="password" class="col-lg-3 col-form-label requerido">Nueva contraseña</label>
                        <div class="col-lg-8">
                            <input type="password" name="password" id="password" class="form-control" value="" required autocomplete="new-password"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="re_password" class="col-lg-3 col-form-label requerido">Repita nueva contraseña</label>
                        <div class="col-lg-8">
                            <input type="password" name="re_password" id="re_password" class="form-control" value="" required/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="guardarc" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
