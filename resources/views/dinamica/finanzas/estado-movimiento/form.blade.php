<div class="form-group row">
    <label for="servicio_tercero_id" class="col-lg-3 col-form-label requerido">Servicio</label>
    <div class="col-lg-8">
        <select name="servicio_tercero_id" id="servicio_tercero_id" class="selectpicker form-control" data-live-search="true">
            <option value="">Seleccione el servicio</option>
            @foreach($servicios_tercero as $servicio_tercero)
            <option value="{{$servicio_tercero->id}}" {{($servicio_tercero->id==old('servicio_tercero_id',$pago_servicio->servicio_tercero->id ?? ''))?'selected':''}}>
                {{$servicio_tercero->nombre}}-{{$servicio_tercero->dirigido_a}}
            </option>
            @endforeach
        </select>

    </div>
</div>
@if (isset($cuentas_contable))
    <div class="form-group row">
        <label for="cuenta_contable_id" class="col-lg-3 col-form-label requerido">Cuenta </label>
        <div class="col-lg-8">
            <select name="cuenta_contable_id" id="cuenta_contable_id" class="selectpicker form-control" data-live-search="true">
                <option value="">Seleccione el servicio</option>
                @foreach($cuentas_contable as $cuenta_contable)
                <option value="{{$cuenta_contable->id}}" {{($cuenta_contable->id==old('cuenta_contable_id',$pago_servicio->asiento->id ?? ''))?'selected':''}}>
                    {{$cuenta_contable->nombre}}(*{{Str::afterLast($cuenta_contable->codigo,'--')}})
                </option>
                @endforeach
            </select>

        </div>
    </div>
@endif
<div class="form-group row">
    <label for="pago" class="col-lg-3 col-form-label">Pago</label>
    <div class="col-lg-8">
        <input type="number" step="0.01" name="pago" id="pago" class="form-control" value="{{old('pago', $pago_servicio->pago ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="fecha_pago" class="col-lg-3 col-form-label">Fecha pago</label>
    <div class="col-lg-8">
        <input type="date" name="fecha_pago" id="fecha_pago" class="form-control" value="{{old('fecha_pago', $pago_servicio->fecha_pago ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="proveedor" class="col-lg-3 col-form-label">proveedor</label>
    <div class="col-lg-8">
        <input type="text" name="proveedor" id="proveedor" class="form-control" value="{{old('proveedor', $pago_servicio->proveedor ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="ruc_proveedor" class="col-lg-3 col-form-label">Ruc</label>
    <div class="col-lg-8">
        <input type="text" name="ruc_proveedor" id="ruc_proveedor" class="form-control" value="{{old('ruc_proveedor', $pago_servicio->ruc_proveedor ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="observacion" class="col-lg-3 col-form-label">Observación</label>
    <div class="col-lg-8">
        <textarea type="text" name="observacion" id="observacion" class="form-control" cols="30" rows="5">{{old('observacion', $compra->observacion ?? '')}}</textarea>
    </div>
</div>
