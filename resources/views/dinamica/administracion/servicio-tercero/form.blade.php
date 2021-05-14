
<div class="form-group row">
    <label for="nombre" class="col-lg-3 col-form-label">Servicio</label>
    <div class="col-lg-8">
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $servicio_tercero->nombre ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="cuenta" class="col-lg-3 col-form-label">Cuenta contable</label>
    <div class="col-lg-8">
        <input type="text" name="cuenta" id="cuenta" class="form-control" value="{{old('cuenta', $servicio_tercero->cuenta ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="tipo_gasto" class="col-lg-3 col-form-label requerido">Tipo de gasto</label>
    <div class="col-lg-8">
        <select name="tipo_gasto" id="tipo_gasto" class="selectpicker form-control" data-live-search="true">
            <option value="">Seleccione el tipo de gasto</option>
            <option value="Administrativo" {{('Administrativo'==old('tipo_gasto',$servicio_tercero->tipo_gasto ?? ''))?'selected':''}}>
                Administrativo
            </option>
            <option value="Ventas" {{('Ventas'==old('tipo_gasto',$servicio_tercero->tipo_gasto ?? ''))?'selected':''}}>
                Ventas
            </option>
            <option value="Producción" {{('Producción'==old('tipo_gasto',$servicio_tercero->tipo_gasto ?? ''))?'selected':''}}>
                Producción
            </option>
        </select>

    </div>
</div>
<div class="form-group row">
    <label for="dirigido_a" class="col-lg-3 col-form-label">Dirigido a</label>
    <div class="col-lg-8">
        <input type="text" name="dirigido_a" id="dirigido_a" class="form-control" value="{{old('dirigido_a', $servicio_tercero->dirigido_a ?? '')}}"/>
    </div>
</div>
