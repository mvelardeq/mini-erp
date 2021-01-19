{{-- {{dd(key($lineas_cotizacion))}}; --}}
{{-- {{dd($descripciones)}}; --}}
{{-- {{dd($subtotales)}}; --}}

<div class="form-group row">
    <label for="numero" class="col-lg-3 col-form-label">Número de factura</label>
    <div class="col-lg-8">
        <input type="text" name="numero" id="numero" class="form-control" value="{{old('numero', $factura->numero ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="fecha_facturacion" class="col-lg-3 col-form-label">Fecha</label>
    <div class="col-lg-8">
        <input type="date" name="fecha_facturacion" id="fecha_facturacion" class="form-control" value="{{old('fecha', $factura->fecha_facturacion ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="contrato_id" class="col-lg-3 col-form-label requerido">Contrato</label>
    <div class="col-lg-8">
        <select name="contrato_id" id="contrato_id" class="selectpicker form-control" data-live-search="true">
            <option value="">Seleccione el contrato</option>
            @foreach($contratos as $contrato)
        <option value="{{$contrato->id}}" {{($contrato->id==old('contrato_id',$factura->concepto_pago->contrato->id ?? ''))?'selected':''}}>
                {{$contrato->equipo->obra->nombre}} (O.E: {{$contrato->equipo->oe}}) {{$contrato->servicio->nombre}}
            </option>
            @endforeach
        </select>

    </div>
</div>

<div class="form-group row">
    <label class="col-lg-3 col-form-label requerido" for="concepto_pago_id">Concepto</label>
        <div class="col-lg-8">
            <select id="concepto_pago_id" name="concepto_pago_id" class="form-control" data-live-search="true">
          </select>
       </div>
</div>

<div id="holders">

</div>

<div class="form-group row">
    <label for="observacion" class="col-lg-3 col-form-label">Observación</label>
    <div class="col-lg-8">
        <textarea name="observacion" id="observacion" class="form-control" cols="30" rows="5">{{old('observacion', $factura->observacion ?? '')}}</textarea>
    </div>
</div>
