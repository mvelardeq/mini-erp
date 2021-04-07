<div class="form-group row">
    <label for="trabajador_id" class="col-lg-3 col-form-label requerido">Trabajador</label>
    <div class="col-lg-8">
        <select name="trabajador_id" id="trabajador_id" class="selectpicker form-control" data-live-search="true">
            <option value="">Seleccione el Trabajador</option>
            @foreach($trabajadores as $trabajador)
        <option value="{{$trabajador->id}}" {{($trabajador->id==old('trabajador_id','otro' ?? ''))?'selected':''}}>
                {{$trabajador->primer_nombre}} {{$trabajador->primer_apellido}}
            </option>
            @endforeach
        </select>

    </div>
</div>
<div class="form-group row">
    <label for="contrato_id" class="col-lg-3 col-form-label requerido">Contrato</label>
    <div class="col-lg-8">
        <select name="contrato_id" id="contrato_id" class="selectpicker form-control" data-live-search="true">
            <option value="">Seleccione el contrato</option>
            @foreach($contratos as $contrato)
        <option value="{{$contrato->id}}" {{($contrato->id==old('contrato_id','otro' ?? ''))?'selected':''}}>
                {{$contrato->equipo->obra->nombre}} (O.E: {{$contrato->equipo->oe}}) {{$contrato->servicio->nombre}}
            </option>
            @endforeach
        </select>

    </div>
</div>

<div class="form-group row">
    <label for="fechaOT" class="col-lg-3 col-form-label">Fecha</label>
    <div class="col-lg-8">
        <input type="date" name="fechaOT" id="fechaOT" class="form-control" value="{{date("Y-m-d")}}" readonly="readonly"/>
    </div>
</div>
