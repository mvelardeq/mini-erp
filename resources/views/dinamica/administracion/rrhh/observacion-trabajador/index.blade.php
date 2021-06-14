@extends("theme.$theme.layout")
@section('titulo')
    Observacion Trabajador
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
                <h3 class="card-title">Observacion Trabajador</h3>
                <div class="card-tools">
                    <a href="{{route('crear_observacion_trabajador')}}" class="btn btn-block btn-success btn-sm">Crear observación</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tabla-data" class="table table-striped table-bordered table-hover table-responsive-sm" role="grid" aria-describedby="example1_info">
                    <thead class="bg-info">
                        <tr role="row">
                            <th >ID</th>
                            <th>Nombres</th>
                            <th>Observación</th>
                            <th>Fecha</th>

                            <th class="width70"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($observaciones as $observacion)
                            <tr role="row">
                                <td>{{$observacion->id}}</td>
                                <td>{{$observacion->trabajador->nombres}}</td>
                                <td>{{$observacion->observacion}}</td>
                                <td>{{$observacion->fecha}}</td>
                                {{-- <td>{{$observacion->foto}}</td> --}}
                                <td>
                                    <a href="{{route("editar_observacion_trabajador", ['id' => $observacion->id])}}" class="btn-accion-tabla tooltips" title="Editar este registro">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{route("eliminar_observacion_trabajador",  ['id' => $observacion->id])}}" class="d-inline form-eliminar" method="POST">
                                        @csrf @method("delete")
                                        <button type="submit" class="btn-accion-tabla eliminar tooltips" title="Eliminar este registro">
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


