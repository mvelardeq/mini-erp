<div class="form-group row">
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
</div>
<div class="form-group row">
    <label for="observacion" class="col-lg-3 col-form-label requerido">Observación</label>
    <div class="col-lg-8">
    <input type="text" name="observacion" id="observacion" class="form-control" value="{{old('observacion', $data->observacion ?? '')}}" required/>
    </div>
</div>
<div class="form-group row">
    <label for="fecha" class="col-lg-3 col-form-label requerido">Fecha</label>
    <div class="col-lg-8">
    <input type="date" name="fecha" id="fecha" class="form-control" value="{{old('fecha', $data->fecha ?? '')}}" required/>
    </div>
</div>
<div class="form-group row">
    <label for="foto" class="col-lg-3 control-form-label">Foto</label>
    <div class="col-lg-8">
        {{-- <input type="file" name="foto_up" id="foto" data-initial-preview="{{isset($data->imagen) ? Storage::url("imagenes/caratulas/$data->imagen") : "http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=Caratula+Libro"}}" accept="image/*"/> --}}
        <input type="file" name="foto_up" id="foto" data-initial-preview="{{isset($data->foto) ? Storage::url("imagenes/caratulas/$data->foto") : "http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=Caratula+Libro"}}" accept="image/*"/>
    </div>
</div>
