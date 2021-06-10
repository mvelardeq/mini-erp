
<div class="form-group row">
    <label for="equipo_id" class="col-lg-3 col-form-label requerido">Equipo</label>
    <div class="col-lg-8">
        <select name="equipo_id" id="equipo_id" class="selectpicker form-control" data-live-search="true">
            <option value="">Seleccione el equipo</option>
            @foreach($equipos as $equipo)
        <option value="{{$equipo->id}}" {{($equipo->id==old('equipo_id',$contrato->equipo->id ?? ''))?'selected':''}}>
                {{$equipo->obra->nombre}} - Asc-{{$equipo->numero_equipo}}
            </option>
            @endforeach
        </select>

    </div>
</div>
<div class="form-group row">
    <label for="servicio_id" class="col-lg-3 col-form-label requerido">Servicio</label>
    <div class="col-lg-8">
        <select name="servicio_id" id="servicio_id" class="form-control" data-live-search="true">
            <option value="">Seleccione el servicio</option>
            @foreach($servicios as $servicio)
        <option value="{{$servicio->id}}" {{($servicio->id==old('servicio_id',$contrato->servicio->id ?? ''))?'selected':''}}>
                {{$servicio->nombre}}
            </option>
            @endforeach
        </select>

    </div>
</div>


<div class="form-group row">
    <label for="horas" class="col-lg-3 col-form-label">Horas</label>
    <div class="col-lg-8">
        <input type="number" step="0.01" name="horas" id="horas" class="form-control" value="{{old('horas', $contrato->horas ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="costo_sin_igv" class="col-lg-3 col-form-label">Costo sin IGV</label>
    <div class="col-lg-8">
        <input type="number" step="0.01" name="costo_sin_igv" id="costo_sin_igv" class="form-control" value="{{old('costo_sin_igv', $contrato->costo_sin_igv ?? '')}}"/>
    </div>
</div>

{{-- <input type="hidden" name="servicio_id" id="servicio_id" class="form-control" value="{{$servicio->id}}" required/> --}}
<div class="form-group row">
    <label for="fecha_inicio" class="col-lg-3 col-form-label">Fecha Inicio</label>
    <div class="col-lg-8">
        <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="{{old('fecha_inicio', $contrato->fecha_inicio ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="fecha_fin" class="col-lg-3 col-form-label">Fecha Fin</label>
    <div class="col-lg-8">
        <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" value="{{old('fecha_fin', $contrato->fecha_fin ?? '')}}"/>
    </div>
</div>
{{-- <div class="form-group row">
    <label for="estado" class="col-lg-3 col-form-label requerido">Estado</label>
    <div class="col-lg-8">
        <select name="estado" id="estado" class="form-control" data-live-search="true">
            <option value="">Seleccione la empresa</option>
            <option value="Abierto" {{("Abierto"==old('estado',$contrato->estado ?? ''))?'selected':''}} > Abierto </option>
            <option value="Cerrado" {{("Cerrado"==old('estado',$contrato->estado ?? ''))?'selected':''}}> Cerrado </option>
        </select>

    </div>
</div> --}}
<div class="form-group row">
    <label for="observacion" class="col-lg-3 col-form-label">Observación</label>
    <div class="col-lg-8">
        <textarea name="observacion" id="observacion" class="form-control" cols="30" rows="5">{{old('observacion', $contrato->observacion ?? '')}}</textarea>
    </div>
</div>







<div class="form-group row">
    <label for="concepto1" class="col-lg-3 col-form-label">Concepto 1</label>
    <div class="col-lg-8">
        <input type="text" name="concepto1" id="concepto1" class="form-control" value="{{old('concepto1', $conceptos[0] ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="porcentaje1" class="col-lg-3 col-form-label">Porcentaje 1</label>
    <div class="col-lg-8">
        <input type="number" name="porcentaje1" id="porcentaje1" class="form-control" value="{{old('porcentaje1', $porcentajes[0] ?? '')}}"/>
    </div>
</div>

<div class="form-group row">
    <label for="concepto2" class="col-lg-3 col-form-label">Concepto 2</label>
    <div class="col-lg-8">
        <input type="text" name="concepto2" id="concepto2" class="form-control" value="{{old('concepto2', $conceptos[1] ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="porcentaje2" class="col-lg-3 col-form-label">Porcentaje 2</label>
    <div class="col-lg-8">
        <input type="number" name="porcentaje2" id="porcentaje2" class="form-control" value="{{old('porcentaje2', $porcentajes[1] ?? '')}}"/>
    </div>
</div>

<div class="form-group row">
    <label for="concepto3" class="col-lg-3 col-form-label">Concepto 3</label>
    <div class="col-lg-8">
        <input type="text" name="concepto3" id="concepto3" class="form-control" value="{{old('concepto3', $conceptos[2] ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="porcentaje3" class="col-lg-3 col-form-label">Porcentaje 3</label>
    <div class="col-lg-8">
        <input type="number" name="porcentaje3" id="porcentaje3" class="form-control" value="{{old('porcentaje3', $porcentajes[2] ?? '')}}"/>
    </div>
</div>

<div class="form-group row">
    <label for="concepto4" class="col-lg-3 col-form-label">Concepto 4</label>
    <div class="col-lg-8">
        <input type="text" name="concepto4" id="concepto4" class="form-control" value="{{old('concepto4', $conceptos[3] ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="porcentaje4" class="col-lg-3 col-form-label">Porcentaje 4</label>
    <div class="col-lg-8">
        <input type="number" name="porcentaje4" id="porcentaje4" class="form-control" value="{{old('porcentaje4', $porcentajes[3] ?? '')}}"/>
    </div>
</div>

<div class="form-group row">
    <label for="concepto5" class="col-lg-3 col-form-label">Concepto 5</label>
    <div class="col-lg-8">
        <input type="text" name="concepto5" id="concepto5" class="form-control" value="{{old('concepto5', $conceptos[4] ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="porcentaje5" class="col-lg-3 col-form-label">Porcentaje 5</label>
    <div class="col-lg-8">
        <input type="number" name="porcentaje5" id="porcentaje5" class="form-control" value="{{old('porcentaje5', $porcentajes[4] ?? '')}}"/>
    </div>
</div>

<div class="form-group row">
    <label for="concepto6" class="col-lg-3 col-form-label">Concepto 6</label>
    <div class="col-lg-8">
        <input type="text" name="concepto6" id="concepto6" class="form-control" value="{{old('concepto6', $conceptos[5] ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="porcentaje6" class="col-lg-3 col-form-label">Porcentaje 6</label>
    <div class="col-lg-8">
        <input type="number" name="porcentaje6" id="porcentaje6" class="form-control" value="{{old('porcentaje6', $porcentajes[5] ?? '')}}"/>
    </div>
</div>
