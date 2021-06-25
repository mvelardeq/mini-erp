<div class="form-group row">
    <label for="cuentacargo" class="col-lg-3 col-form-label">Cuenta de cargo</label>
    <div class="col-lg-8">
        <input type="text" name="cuentacargo" id="cuentacargo" class="form-control" value="{{$cuenta_cargo->nombre}}" disabled/>
    </div>
</div>

<div class="form-group row">
    <label for="cuentaabono_id" class="col-lg-3 col-form-label requerido">Cuenta de abono</label>
    <div class="col-lg-8">
        <select name="cuentaabono_id" id="cuentaabono_id" class="selectpicker form-control" data-live-search="true">
            <option value="">Seleccione la cuenta</option>
            @foreach($cuentas_contables as $cuenta_contable)
            <option value="{{$cuenta_contable->id}}" {{($cuenta_contable->id==old('cuentaabono_id',$transferencia->servicio_tercero->id ?? ''))?'selected':''}}>
                {{$cuenta_contable->nombre}} (*{{Str::substr($cuenta_contable->numero_cuenta,-4)}})
            </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="fecha_pago" class="col-lg-3 col-form-label">Cantidad en soles</label>
    <div class="col-lg-8">
        <input type="number" step="0.01" name="cantidad" id="cantidad" class="form-control" value="{{old('cantidad', $transferencia->pago ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="fecha_pago" class="col-lg-3 col-form-label">Fecha</label>
    <div class="col-lg-8">
        <input type="date" name="fecha" id="fecha" class="form-control" value="{{old('fecha', $transferencia->fecha ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="observacion" class="col-lg-3 col-form-label">Observación</label>
    <div class="col-lg-8">
        <textarea name="observacion" id="observacion" class="form-control" cols="30" rows="5">{{old('observacion', $transferencia->observacion ?? '')}}</textarea>
    </div>
</div>
