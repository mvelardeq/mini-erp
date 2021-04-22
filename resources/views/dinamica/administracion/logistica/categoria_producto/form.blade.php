<div class="form-group row">
    <label for="razon_social" class="col-lg-3 col-form-label">Razón Social</label>
    <div class="col-lg-8">
        <input type="text" name="razon_social" id="razon_social" class="form-control" value="{{old('razon_social', $empresa->razon_social ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="ruc" class="col-lg-3 col-form-label">RUC</label>
    <div class="col-lg-8">
        <input type="text" name="ruc" id="ruc" class="form-control" value="{{old('ruc', $empresa->ruc ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="pago_hora" class="col-lg-3 col-form-label">Pago horas (soles/hora)</label>
    <div class="col-lg-8">
        <input type="number" name="pago_hora" id="pago_hora" class="form-control" value="{{old('pago_hora', $empresa->pago_hora ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="direccion" class="col-lg-3 col-form-label">Dirección</label>
    <div class="col-lg-8">
        <input type="text" name="direccion" id="direccion" class="form-control" value="{{old('direccion', $empresa->direccion ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="actividad" class="col-lg-3 col-form-label">Actividad</label>
    <div class="col-lg-8">
        <input type="text" name="actividad" id="actividad" class="form-control" value="{{old('actividad', $empresa->actividad ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="porcentaje_detraccion" class="col-lg-3 col-form-label">% detracción</label>
    <div class="col-lg-8">
        <input type="number" name="porcentaje_detraccion" id="porcentaje_detraccion" class="form-control" value="{{old('ruc', $empresa->porcentaje_detraccion ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="observacion" class="col-lg-3 col-form-label">Observación</label>
    <div class="col-lg-8">
        <textarea name="observacion" id="observacion" class="form-control" cols="30" rows="5">{{old('observacion', $empresa->observacion ?? '')}}</textarea>
    </div>
</div>
