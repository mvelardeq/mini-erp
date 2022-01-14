{{-- {{dd(key($lineas_cotizacion))}}; --}}
{{-- {{dd($descripciones)}}; --}}
{{-- {{dd($subtotales)}}; --}}
<div class="form-group row">
    <label for="numero" class="col-lg-3 col-form-label">Número de cotización</label>
    <div class="col-lg-8">
        <input type="text" required name="numero" id="numero" class="form-control" value="{{old('numero', $cotizacion->numero ?? '')}}"/>
    </div>
</div>

<div class="form-group row">
    <label for="equipo_id" class="col-lg-3 col-form-label requerido">Equipo</label>
    <div class="col-lg-8">
        <select name="equipo_id" required id="equipo_id" class="selectpicker form-control" data-live-search="true">
            <option value="">Seleccione el equipo</option>
            @foreach($equipos as $equipo)
        <option value="{{$equipo->id}}" {{($equipo->id==old('equipo_id',$cotizacion->equipo->id ?? ''))?'selected':''}}>
                {{$equipo->obra->nombre}} (OE-{{$equipo->oe}})
            </option>
            @endforeach
        </select>

    </div>
</div>

<div class="form-group row">
    <label for="resumen" class="col-lg-3 col-form-label">Resumen</label>
    <div class="col-lg-8">
        <input type="text" required name="resumen" id="resumen" class="form-control" value="{{old('resumen', $cotizacion->resumen ?? '')}}"/>
    </div>
</div>

{{-- <input type="hidden" name="servicio_id" id="servicio_id" class="form-control" value="{{$servicio->id}}" required/> --}}
<div class="form-group row">
    <label for="fecha" class="col-lg-3 col-form-label">Fecha</label>
    <div class="col-lg-8">
        <input type="date" required name="fecha" id="fecha" class="form-control" value="{{old('fecha', $cotizacion->fecha ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="dirigido_a" class="col-lg-3 col-form-label">Dirigido a</label>
    <div class="col-lg-8">
        <input type="text" required name="dirigido_a" id="dirigido_a" class="form-control" value="{{old('dirigido_a', $cotizacion->dirigido_a ?? '')}}"/>
    </div>
</div>







<div class="form-group row">
    <label for="descripcion1" class="col-lg-3 col-form-label">Descripción 1</label>
    <div class="col-lg-8">
        <input type="text" required name="descripcion1" id="descripcion1" class="form-control" value="{{old('descripcion1', $descripciones[0] ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="cantidad1" class="col-lg-3 col-form-label">Cantidad 1</label>
    <div class="col-lg-8">
        <input type="number" required name="cantidad1" id="cantidad1" class="form-control" value="{{old('cantidad1', $cantidades[0] ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="subtotal1" class="col-lg-3 col-form-label">Sub total 1</label>
    <div class="col-lg-8">
        <input type="number" required name="subtotal1" id="subtotal1" class="form-control" value="{{old('subtotal1', $subtotales[0] ?? '')}}"/>
    </div>
</div>

<div class="form-group row">
    <label for="descripcion2" class="col-lg-3 col-form-label">Descripción 2</label>
    <div class="col-lg-8">
        <input type="text" name="descripcion2" id="descripcion2" class="form-control" value="{{old('descripcion2', $descripciones[1] ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="cantidad2" class="col-lg-3 col-form-label">Cantidad 2</label>
    <div class="col-lg-8">
        <input type="number" name="cantidad2" id="cantidad2" class="form-control" value="{{old('cantidad2', $cantidades[1] ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="subtotal2" class="col-lg-3 col-form-label">Sub total 2</label>
    <div class="col-lg-8">
        <input type="number" name="subtotal2" id="subtotal2" class="form-control" value="{{old('subtotal2', $subtotales[1] ?? '')}}"/>
    </div>
</div>

<div class="form-group row">
    <label for="descripcion3" class="col-lg-3 col-form-label">Descripción 3</label>
    <div class="col-lg-8">
        <input type="text" name="descripcion3" id="descripcion3" class="form-control" value="{{old('descripcion3', $descripciones[2] ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="cantidad3" class="col-lg-3 col-form-label">Cantidad 3</label>
    <div class="col-lg-8">
        <input type="number" name="cantidad3" id="cantidad3" class="form-control" value="{{old('cantidad3', $cantidades[2] ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="subtotal3" class="col-lg-3 col-form-label">Sub total 3</label>
    <div class="col-lg-8">
        <input type="number" name="subtotal3" id="subtotal3" class="form-control" value="{{old('subtotal3', $subtotales[2] ?? '')}}"/>
    </div>
</div>

<div class="form-group row">
    <label for="descripcion4" class="col-lg-3 col-form-label">Descripción 4</label>
    <div class="col-lg-8">
        <input type="text" name="descripcion4" id="descripcion4" class="form-control" value="{{old('descripcion4', $descripciones[3] ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="cantidad4" class="col-lg-3 col-form-label">Cantidad 4</label>
    <div class="col-lg-8">
        <input type="number" name="cantidad4" id="cantidad4" class="form-control" value="{{old('cantidad4', $cantidades[3] ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="subtotal4" class="col-lg-3 col-form-label">Sub total 4</label>
    <div class="col-lg-8">
        <input type="number" name="subtotal4" id="subtotal4" class="form-control" value="{{old('subtotal4', $subtotales[3] ?? '')}}"/>
    </div>
</div>

<div class="form-group row">
    <label for="descripcion5" class="col-lg-3 col-form-label">Descripción 5</label>
    <div class="col-lg-8">
        <input type="text" name="descripcion5" id="descripcion5" class="form-control" value="{{old('descripcion5', $descripciones[4] ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="cantidad5" class="col-lg-3 col-form-label">Cantidad 5</label>
    <div class="col-lg-8">
        <input type="number" name="cantidad5" id="cantidad5" class="form-control" value="{{old('cantidad5', $cantidades[4] ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="subtotal5" class="col-lg-3 col-form-label">Sub total 5</label>
    <div class="col-lg-8">
        <input type="number" name="subtotal5" id="subtotal5" class="form-control" value="{{old('subtotal5', $subtotales[4] ?? '')}}"/>
    </div>
</div>

<div class="form-group row">
    <label for="descripcion6" class="col-lg-3 col-form-label">Descripción 6</label>
    <div class="col-lg-8">
        <input type="text" name="descripcion6" id="descripcion6" class="form-control" value="{{old('descripcion6', $descripciones[5] ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="cantidad6" class="col-lg-3 col-form-label">Cantidad 6</label>
    <div class="col-lg-8">
        <input type="number" name="cantidad6" id="cantidad6" class="form-control" value="{{old('cantidad6', $cantidades[5] ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="subtotal6" class="col-lg-3 col-form-label">Sub total 6</label>
    <div class="col-lg-8">
        <input type="number" name="subtotal6" id="subtotal6" class="form-control" value="{{old('subtotal6', $subtotales[5] ?? '')}}"/>
    </div>
</div>





{{--
<div class="form-group row">
    <label for="observacion" class="col-lg-3 col-form-label">Observación</label>
    <div class="col-lg-8">
        <textarea name="observacion" id="observacion" class="form-control" cols="30" rows="5">{{old('observacion', $servicio->observacion ?? '')}}</textarea>
    </div>
</div> --}}
