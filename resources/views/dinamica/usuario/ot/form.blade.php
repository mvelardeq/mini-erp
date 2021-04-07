@php
    use Carbon\Carbon;
@endphp
<input type="hidden" name="trabajador_id" id="trabajador_id" class="form-control" value={{auth()->user()->id}} required/>

<div class="form-group row">
    <label for="contrato_id" class="col-lg-3 col-form-label requerido">Contrato</label>
    <div class="col-lg-8">
        <select name="contrato_id" id="contrato_id" class="selectpicker form-control" data-live-search="true">
            <option value="">Seleccione el contrato</option>
            @foreach($contratos as $contrato)
        <option value="{{$contrato->id}}" {{($contrato->id==old('contrato_id',$ot->contrato->id ?? ''))?'selected':''}}>
                {{$contrato->equipo->obra->nombre}} (O.E: {{$contrato->equipo->oe}}) {{$contrato->servicio->nombre}}
            </option>
            @endforeach
        </select>

    </div>
</div>
<div class="form-group row">
    <label for="fecha" class="col-lg-3 col-form-label">Fecha</label>
    <div class="col-lg-8">
        <input type="date" name="fecha" id="fecha" class="form-control" value="{{date("Y-m-d")}}" readonly="readonly"/>
    </div>
</div>


<div class="form-group row">
    <label class="col-lg-3 col-form-label requerido" for="actividad1_id">Actividad 1</label>
    <div class="col-lg-4">
        <select id="actividad1_id" name="actividad1_id" class="form-control" data-live-search="true">
        </select>
    </div>

    <label for="horas1" class="col-lg-2 col-form-label">Horas 1</label>
    <div class="col-lg-2">
        <input type="number" name="horas1" id="horas1" class="form-control" value="{{old('horas1', $ot->ot_actividad->horas ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label class="col-lg-3 col-form-label requerido" for="actividad2_id">Actividad 2</label>
    <div class="col-lg-4">
        <select id="actividad2_id" name="actividad2_id" class="form-control" data-live-search="true">
        </select>
    </div>

    <label for="horas2" class="col-lg-2 col-form-label">Horas 2</label>
    <div class="col-lg-2">
        <input type="number" name="horas2" id="horas2" class="form-control" value="{{old('horas2', $ot->ot_actividad->horas ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label class="col-lg-3 col-form-label requerido" for="actividad1_id">Actividad 3</label>
    <div class="col-lg-4">
        <select id="actividad3_id" name="actividad3_id" class="form-control" data-live-search="true">
        </select>
    </div>

    <label for="horas1" class="col-lg-2 col-form-label">Horas 3</label>
    <div class="col-lg-2">
        <input type="number" name="horas3" id="horas3" class="form-control" value="{{old('horas3', $ot->ot_actividad->horas ?? '')}}"/>
    </div>
</div>



<div class="form-group row">
    <label for="pedido" class="col-lg-3 col-form-label">Pedido</label>
    <div class="col-lg-8">
        <textarea name="pedido" id="pedido" class="form-control" cols="30" rows="5" value="{{old('pedido', $ot->pedido ?? '')}}"></textarea>
    </div>
</div>

<input type="hidden" name="estado_ot_id" id="estado_ot_id" class="form-control" value="1" required/>
