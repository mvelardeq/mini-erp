@extends("theme.$theme.layout")
@section('titulo')
Equipos
@endsection

@section("script")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/operaciones/equipo/index.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('dinamica.includes.mensaje')
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Equipos</h3>
                <div class="card-tools">
                    <a href="{{route('crear_equipo')}}" class="btn btn-block btn-success btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                    </a>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-bordered table-hover table-responsive-lg" id="tabla-data">
                    <thead class="bg-dark">
                        <tr>
                            <th>N° de equipo</th>
                            <th>Obra</th>
                            <th>OE</th>
                            <th>Vel.(m/s)</th>
                            <th>Paradas</th>
                            <th>Carga (kg)</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Accesos</th>
                            <th>Cuarto de máq.</th>
                            <th>Plano</th>

                            <th class="width70"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($equipos as $equipo)
                        <tr>
                            <td><a href="#">Asc-{{$equipo->numero_equipo}}</a></td>
                            <td>{{$equipo->obra->nombre}}</td>
                            <td>{{$equipo->oe}}</td>
                            <td>{{$equipo->velocidad}}</td>
                            <td>{{$equipo->paradas}}</td>
                            <td>{{$equipo->carga}}</td>
                            <td>{{$equipo->marca}}</td>
                            <td>{{$equipo->modelo}}</td>
                            <td>{{$equipo->accesos}}</td>
                            <td>{{$equipo->cuarto_maquina}}</td>
                            <td id="plano{{$equipo->id}}">
                                @if (isset($equipo->plano))
                                    <a href="{{Storage::disk('s3')->url('files/planes/'.$equipo->plano)}}" target="_blank"><i class="fas fa-file-pdf text-danger"></i></a>
                                @else
                                    <form class="d-inline subir-plano" data-id="{{$equipo->id}}">
                                        @csrf
                                        <button type="submit" class="btn-accion-tabla eliminar tooltips" data-toggle="modal" title="Subir plano">
                                            <i class="fas fa-plus-circle text-success"></i>
                                        </button>
                                    </form>
                                @endif
                            </td>

                            <td>
                                <a href="{{route('editar_equipo', ['id' => $equipo->id])}}" class="btn-accion-tabla tooltips" title="Editar este registro">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{route('eliminar_equipo', ['id' => $equipo->id])}}" class="d-inline form-eliminar" method="POST">
                                    @csrf @method("delete")
                                    <button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Eliminar este registro">
                                        <i class="fa fa-fw fa-trash text-danger"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>


        {{-- Modal Subir plano --}}
        <div class="modal fade" id="modalSubir" tabindex="-1" role="dialog" aria-labelledby="modalSubirLabel" aria-hidden="true">

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="modalSubirLabel">Subir plano</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form class="form-subir" autocomplete="off" enctype="multipart/form-data" id="subirid">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" id = "modalSubirid" name="id">
                            <div class="form-group row">
                                <label for="planoModal" class="col-lg-3 col-form-label">Seleccionar archivo</label>
                                <div class="col-lg-8">
                                    <input type="file" name="planoModal" id="planoModal" data-initial-preview="{{isset($equipo->plano) ? Storage::disk('s3')->url("files/planes/$equipo->plano") : "http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=Plano"}}" accept="application/pdf"/>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button id="pagarfactura" type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



    </div>
</div>
@endsection
