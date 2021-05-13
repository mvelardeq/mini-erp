
<div class="form-group row">
    <label for="nombre" class="col-lg-3 col-form-label">Servicio</label>
    <div class="col-lg-8">
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $servicio_tercero->nombre ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="dirigido_a" class="col-lg-3 col-form-label">Dirigido a</label>
    <div class="col-lg-8">
        <input type="text" name="dirigido_a" id="dirigido_a" class="form-control" value="{{old('dirigido_a', $servicio_tercero->dirigido_a ?? '')}}"/>
    </div>
</div>
