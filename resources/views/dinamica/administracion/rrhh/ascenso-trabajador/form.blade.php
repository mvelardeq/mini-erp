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
    <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="{{old('fecha_inicio', $trabajador->periodos->last()->fecha_inicio ?? '')}}" disabled/>
    </div>
</div>
<div class="form-group row">
    <label for="fecha_fin" class="col-lg-3 col-form-label">Fecha de fin</label>
    <div class="col-lg-8">
    <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" value="{{old('fecha_fin', $trabajador->periodos->last()->fecha_fin ?? '')}}" disabled>
    </div>
</div>
<div class="form-group row">
    <label for="fecha" class="col-lg-3 col-form-label requerido">Fecha de ascenso</label>
    <div class="col-lg-8">
    <input type="date" name="fecha" id="fecha" class="form-control" value="{{old('fecha', $trabajador->periodos->last()->fecha ?? '')}}" required>
    </div>
</div>
<div class="form-group row">
    <label for="cargo_trabajador_id" class="col-lg-3 col-form-label requerido">Cargo</label>
    <div class="col-lg-8">
        <select name="cargo_trabajador_id" id="cargo_trabajador_id" class="form-control" required>
            <option value="">Seleccione el cargo</option>
            @foreach($cargo_trabajador as $cargo_trabajador)
        <option value="{{$cargo_trabajador->id}}" {{($cargo_trabajador->id==$ascensos->last()->cargo->id)?'selected':''}}>
                {{$cargo_trabajador->nombre}}
            </option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="sueldo" class="col-lg-3 col-form-label requerido">Sueldo</label>
    <div class="col-lg-8">
    <input type="number" name="sueldo" id="sueldo" class="form-control" value="{{old('sueldo', $ascensos->last()->sueldo ?? '')}}" required>
    </div>
</div>
<div class="form-group row">
    <label for="observacion" class="col-lg-3 col-form-label">Observación</label>
    <div class="col-lg-8">
        <textarea name="observacion" id="observacion" class="form-control" cols="30" rows="5" value="{{old('observacion', $trabajador->observacion ?? '')}}"></textarea>
    </div>
</div>
