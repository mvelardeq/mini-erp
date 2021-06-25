@if (isset($cuentas_contable))
    <div class="form-group row">
        <label for="cuenta_contable_id" class="col-lg-3 col-form-label requerido">Cuenta de cargo </label>
        <div class="col-lg-8">
            <select name="cuenta_contable_id" id="cuenta_contable_id" class="selectpicker form-control" data-live-search="true" required>
                <option value="">Seleccione la cuenta</option>
                @foreach($cuentas_contable as $cuenta_contable)
                <option value="{{$cuenta_contable->id}}" {{($cuenta_contable->id==old('cuenta_contable_id',$compra->asiento->id ?? ''))?'selected':''}}>
                    {{$cuenta_contable->nombre}}(*{{Str::substr($cuenta_contable->numero_cuenta,-4)}})
                </option>
                @endforeach
            </select>

        </div>
    </div>
@endif
<div class="form-group row">
    <label for="proveedor" class="col-lg-3 col-form-label">Proveedor</label>
    <div class="col-lg-8">
        <input type="text" name="proveedor" id="proveedor" class="form-control" value="{{old('proveedor', $compra->proveedor ?? '')}}" required/>
    </div>
</div>

<div class="form-group row">
    <label for="fecha" class="col-lg-3 col-form-label">Fecha</label>
    <div class="col-lg-8">
        <input type="date" name="fecha" id="fecha" class="form-control" value="{{old('fecha', $compra->fecha ?? '')}}" required/>
    </div>
</div>

<div class="form-group row">
    <label for="ruc_proveedor" class="col-lg-3 col-form-label">RUC</label>
    <div class="col-lg-8">
        <input type="text" name="ruc_proveedor" id="ruc_proveedor" class="form-control" value="{{old('ruc_proveedor', $compra->ruc_proveedor ?? '')}}"/>
    </div>
</div>

<div class="form-group row">
    <label for="observacion" class="col-lg-3 col-form-label">Observación</label>
    <div class="col-lg-8">
        <textarea type="text" name="observacion" id="observacion" class="form-control" cols="30" rows="5">{{old('observacion', $compra->observacion ?? '')}}</textarea>
    </div>
</div>

