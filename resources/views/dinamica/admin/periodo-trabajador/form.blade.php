{{-- <div class="form-group row">
    <label for="rol_id" class="col-lg-3 col-form-label requerido">Trabajador</label>
    <div class="col-lg-8">
        <select name="rol_id[]" id="rol_id" class="form-control">
            <option value="">Seleccione el trabajador</option>
            @foreach($trabajador as $id => $nombres)
        <option value="{{$id}}">
                {{$nombres}}
            </option>
            @endforeach
        </select>
    </div>
</div> --}}

<input type="hidden" name="trabajador_id" id="trabajador_id" class="form-control" value="{{$trabajador->id}}" required/>

<div class="form-group row">
    <label for="fecha_inicio" class="col-lg-3 col-form-label requerido">Fecha de inicio</label>
    <div class="col-lg-8">
    <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="{{old('fecha_inicio', $data->fecha_inicio ?? '')}}" required/>
    </div>
</div>
<div class="form-group row">
    <label for="fecha_fin" class="col-lg-3 col-form-label">Fecha de fin</label>
    <div class="col-lg-8">
    <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" value="{{old('fecha_fin', $data->fecha_fin ?? '')}}">
    </div>
</div>
