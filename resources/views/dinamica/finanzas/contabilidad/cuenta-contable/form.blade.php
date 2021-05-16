
<div class="form-group row">
    <label for="codigo" class="col-lg-3 col-form-label">Código de cuenta</label>
    <div class="col-lg-8">
        <input type="text" name="codigo" id="codigo" class="form-control" value="{{old('codigo', $cuenta_contable->codigo ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="nombre" class="col-lg-3 col-form-label">Nombre</label>
    <div class="col-lg-8">
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $cuenta_contable->nombre ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="saldo" class="col-lg-3 col-form-label">Saldo</label>
    <div class="col-lg-8">
        <input type="number" step="0.01" name="saldo" id="saldo" class="form-control" value="{{old('saldo', $cuenta_contable->saldo ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="banco" class="col-lg-3 col-form-label">Banco</label>
    <div class="col-lg-8">
        <input type="text" name="banco" id="banco" class="form-control" value="{{old('banco', $cuenta_contable->banco ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="numero_cuenta" class="col-lg-3 col-form-label">Número de cuenta</label>
    <div class="col-lg-8">
        <input type="text" name="numero_cuenta" id="numero_cuenta" class="form-control" value="{{old('numero_cuenta', $cuenta_contable->numero_cuenta ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="responsable_id" class="col-lg-3 col-form-label requerido">Responsable de cuenta</label>
    <div class="col-lg-8">
        <select name="responsable_id" id="responsable_id" class="selectpicker form-control" data-live-search="true">
            <option value="">Seleccione el responsable</option>
            @foreach($trabajadores as $trabajador)
            <option value="{{$trabajador->id}}" {{($trabajador->id==old('responsable_id',$cuenta_contable->responsable_id ?? ''))?'selected':''}}>
                {{$trabajador->primer_nombre}} {{$trabajador->primer_apellido}}
            </option>
            @endforeach
        </select>

    </div>
</div>
