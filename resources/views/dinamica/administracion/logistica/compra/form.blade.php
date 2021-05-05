
<div class="form-group row">
    <label for="proveedor" class="col-lg-3 col-form-label">Proveedor</label>
    <div class="col-lg-8">
        <input type="text" name="proveedor" id="proveedor" class="form-control" value="{{old('proveedor', $compra->proveedor ?? '')}}"/>
    </div>
</div>

<div class="form-group row">
    <label for="fecha" class="col-lg-3 col-form-label">Fecha</label>
    <div class="col-lg-8">
        <input type="date" name="fecha" id="fecha" class="form-control" value="{{old('fecha', $compra->fecha ?? '')}}"/>
    </div>
</div>

<div class="form-group row">
    <label for="ruc_proveedor" class="col-lg-3 col-form-label">RUC</label>
    <div class="col-lg-8">
        <input type="text" name="ruc_proveedor" id="ruc_proveedor" class="form-control" value="{{old('ruc_proveedor', $compra->ruc_proveedor ?? '')}}"/>
    </div>
</div>

{{-- <div class="form-group row">
    <label for="observacion" class="col-lg-3 col-form-label">Observacion</label>
    <div class="col-lg-8">
        <input type="text" name="observacion" id="observacion" class="form-control" value="{{old('observacion', $compra->observacion ?? '')}}"/>
    </div>
</div> --}}

