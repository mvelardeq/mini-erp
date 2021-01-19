{{-- {{dd($actividades)}}; --}}
{{-- {{dd($servicio->actividades)}}; --}}
<div class="form-group row">
    <label for="nombre" class="col-lg-3 col-form-label">Nombre del servicio</label>
    <div class="col-lg-8">
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $servicio->nombre ?? '')}}"/>
    </div>
</div>

{{-- <input type="hidden" name="servicio_id" id="servicio_id" class="form-control" value="{{$servicio->id}}" required/> --}}
<div class="form-group row">
    <label for="actividad1" class="col-lg-3 col-form-label">Actividad 1</label>
    <div class="col-lg-8">
        <input type="text" name="actividad1" id="actividad1" class="form-control" value="{{old('actividad1', $servicio->actividades[0]['nombre'] ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="actividad2" class="col-lg-3 col-form-label">Actividad 2</label>
    <div class="col-lg-8">
        <input type="text" name="actividad2" id="actividad2" class="form-control" value="{{old('actividad2', $servicio->actividades[1]['nombre'] ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="actividad3" class="col-lg-3 col-form-label">Actividad 3</label>
    <div class="col-lg-8">
        <input type="text" name="actividad3" id="actividad3" class="form-control" value="{{old('actividad3', $servicio->actividades[2]['nombre'] ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="actividad4" class="col-lg-3 col-form-label">Actividad 4</label>
    <div class="col-lg-8">
        <input type="text" name="actividad4" id="actividad4" class="form-control" value="{{old('actividad4', $servicio->actividades[3]['nombre'] ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="actividad5" class="col-lg-3 col-form-label">Actividad 5</label>
    <div class="col-lg-8">
        <input type="text" name="actividad5" id="actividad5" class="form-control" value="{{old('actividad5', $servicio->actividades[4]['nombre'] ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="actividad6" class="col-lg-3 col-form-label">Actividad 6</label>
    <div class="col-lg-8">
        <input type="text" name="actividad6" id="actividad6" class="form-control" value="{{old('actividad6', $servicio->actividades[5]['nombre'] ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="actividad7" class="col-lg-3 col-form-label">Actividad 7</label>
    <div class="col-lg-8">
        <input type="text" name="actividad7" id="actividad7" class="form-control" value="{{old('actividad7', $servicio->actividades[6]['nombre'] ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="actividad8" class="col-lg-3 col-form-label">Actividad 8</label>
    <div class="col-lg-8">
        <input type="text" name="actividad8" id="actividad8" class="form-control" value="{{old('actividad8', $servicio->actividades[7]['nombre'] ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="actividad9" class="col-lg-3 col-form-label">Actividad 9</label>
    <div class="col-lg-8">
        <input type="text" name="actividad9" id="actividad9" class="form-control" value="{{old('actividad9', $servicio->actividades[8]['nombre'] ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="actividad10" class="col-lg-3 col-form-label">Actividad 10</label>
    <div class="col-lg-8">
        <input type="text" name="actividad10" id="actividad10" class="form-control" value="{{old('actividad10', $servicio->actividades[9]['nombre'] ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="actividad11" class="col-lg-3 col-form-label">Actividad 11</label>
    <div class="col-lg-8">
        <input type="text" name="actividad11" id="actividad11" class="form-control" value="{{old('actividad11', $servicio->actividades[10]['nombre'] ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="actividad12" class="col-lg-3 col-form-label">Actividad 12</label>
    <div class="col-lg-8">
        <input type="text" name="actividad12" id="actividad12" class="form-control" value="{{old('actividad12', $servicio->actividades[11]['nombre'] ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="actividad13" class="col-lg-3 col-form-label">Actividad 13</label>
    <div class="col-lg-8">
        <input type="text" name="actividad13" id="actividad13" class="form-control" value="{{old('actividad13', $servicio->actividades[12]['nombre'] ?? '')}}"/>
    </div>
</div>


<div class="form-group row">
    <label for="observacion" class="col-lg-3 col-form-label">Observación</label>
    <div class="col-lg-8">
        <textarea name="observacion" id="observacion" class="form-control" cols="30" rows="5">{{old('observacion', $servicio->observacion ?? '')}}</textarea>
    </div>
</div>
