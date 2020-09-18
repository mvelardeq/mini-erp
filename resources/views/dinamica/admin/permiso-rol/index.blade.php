@extends("theme.$theme.layout")
@section("titulo")
Permiso - Rol
@endsection

@section("script")
<script src="{{asset("assets/pages/scripts/admin/permiso-rol/index.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('dinamica.includes.mensaje')
        <div class="card card-success card-outline">
            <div class="card-header">
                <h3 class="card-title">Menús - Rol</h3>
            </div>
            <div class="card-body">
                @csrf
                <table class="table table-striped table-bordered table-hover table-responsive-sm" id="tabla-data">
                    <thead>
                        <tr>
                            <th>Permiso</th>
                            @foreach ($rols as $id => $nombre)
                            <th class="text-center">{{$nombre}}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permisos as $key => $permiso)
                            <tr>
                                <td class="font-weight-bold">{{$permiso["nombre"]}}</td>
                                @foreach($rols as $id => $nombre)
                                    <td class="text-center">
                                        <input
                                        type="checkbox"
                                        class="permiso_rol"
                                        name="permiso_rol[]"
                                        data-permisoid={{$permiso[ "id"]}}
                                        value="{{$id}}" {{in_array($id, array_column($permisosRols[$permiso["id"]], "id"))? "checked" : ""}}>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
