
<input type="hidden" name="trabajador_id" id="trabajador_id" class="form-control" value="{{$trabajador->id}}" required/>

<div class="form-group row">
    <label for="titulo_observacion" class="col-lg-3 col-form-label requerido">Título de Observación</label>
    <div class="col-lg-8">
    <input type="text" name="titulo_observacion" id="titulo_observacion" class="form-control" value="{{old('observacion', $data->observacion ?? '')}}" required/>
    </div>
</div>
<div class="form-group row">
    <label for="observacion" class="col-lg-3 col-form-label">Observación</label>
    <div class="col-lg-8">
        <textarea name="observacion" id="observacion" class="form-control" cols="30" rows="5" value="{{old('observacion', $data->observacion ?? '')}}" required></textarea>
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
        <input type="file" name="foto_up" id="foto" data-initial-preview="{{isset($data->foto) ? Storage::disk('s3')->url("photos/workerObs/$data->foto") : "http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=Observación"}}" accept="image/*"/>
    </div>
</div>


