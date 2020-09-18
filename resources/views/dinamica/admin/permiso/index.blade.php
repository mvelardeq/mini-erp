@extends("theme.$theme.layout")
@section('titulo')
    Permiso
@endsection

@section('script')
    <script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            @include('dinamica.includes.mensaje')
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Bordered Table</h3>
                <div class="card-tools">
                    <a href="{{route('crear_permiso')}}" class="btn btn-block btn-success btn-sm">Crear permiso</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tabla-data" class="table table-striped table-bordered table-hover table-responsive-sm" role="grid" aria-describedby="example1_info">
                    <thead class="bg-info">
                        <tr role="row">
                            <th >ID</th>
                            <th>Nombre</th>
                            <th>Slug</th>

                            <th class="width70"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permisos as $permiso)
                            <tr role="row">
                                <td>{{$permiso->id}}</td>
                                <td>{{$permiso->nombre}}</td>
                                <td>{{$permiso->slug}}</td>
                                <td>
                                    <a href="{{route("editar_permiso", ['id' => $permiso->id])}}" class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{route("eliminar_permiso",  ['id' => $permiso->id])}}" class="d-inline form-eliminar" method="POST">
                                        @csrf @method("delete")
                                        <button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Eliminar este registro">
                                            <i class="fas fa-times-circle text-danger"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
        <!-- /.card -->
        </div>
    </div>
@endsection


