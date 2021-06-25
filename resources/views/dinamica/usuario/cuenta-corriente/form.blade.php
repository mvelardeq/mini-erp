<div class="form-group row">
    <label for="pago" class="col-lg-3 col-form-label">Cuenta de cargo</label>
    <div class="col-lg-8">
        <input type="text" name="pago" id="pago" class="form-control" value="{{$cuenta_cargo->id}}" placeholder="{{$cuenta_cargo->nombre}}" disabled/>
    </div>
</div>
{{-- <div class="form-group row">
    <label for="servicio_tercero_id" class="col-lg-3 col-form-label requerido">Cuenta de abono</label>
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

<div class="form-group row">
    <label for="fecha_pago" class="col-lg-3 col-form-label">Cantidad en soles</label>
    <div class="col-lg-8">
        <input type="number" name="pago" id="pago" class="form-control" value="{{old('fecha_pago', $pago_servicio->fecha_pago ?? '')}}"/>
    </div>
</div> --}}
