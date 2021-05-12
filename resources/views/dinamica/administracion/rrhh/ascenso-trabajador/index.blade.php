@extends("theme.$theme.layout")
@section('titulo')
    Periodo Trabajador
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
                <h3 class="card-title">Periodo Trabajador</h3>
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
                            <th>Trabajador</th>
                            <th>Fecha de inicio</th>
                            <th>Fecha de cese</th>

                            <th class="width70"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($periodos as $periodo)
                            <tr role="row">
                                <td>{{$periodo->id}}</td>
                                <td>{{$periodo->trabajador->primer_nombre." ".$periodo->trabajador->primer_apellido}}</td>
                                <td>{{$periodo->fecha_inicio}}</td>
                                <td>{{$periodo->fecha_fin}}</td>
                                {{-- <td>{{$observacion->foto}}</td> --}}
                                <td>
                                    <a href="{{route("editar_periodo_trabajador", ['id' => $observacion->id])}}" class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{route("eliminar_periodo_trabajador",  ['id' => $periodo->id])}}" class="d-inline form-eliminar" method="POST">
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


