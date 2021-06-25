<div class="form-group row">
    <label for="numero_equipo" class="col-lg-3 col-form-label requerido">Número de equipo</label>
    <div class="col-lg-8">
        <input type="text" name="numero_equipo" id="numero_equipo" class="form-control" value="{{old('numero_equipo', $equipo->numero_equipo ?? '')}}" required/>
    </div>
</div>
<div class="form-group row">
    <label for="obra_id" class="col-lg-3 col-form-label requerido">Obra</label>
    <div class="col-lg-8">
        <select name="obra_id" id="obra_id" class="selectpicker form-control" data-live-search="true" required>
            <option value="">Seleccione la obra</option>
            @foreach($obras as $obra)
        <option value="{{$obra->id}}" {{($obra->id==old('obra_id',$equipo->obra->id ?? ''))?'selected':''}}>
                {{$obra->nombre}}
            </option>
            @endforeach
        </select>

    </div>
</div>
<div class="form-group row">
    <label for="empresa_id" class="col-lg-3 col-form-label requerido">Empresa</label>
    <div class="col-lg-8">
        <select name="empresa_id" id="empresa_id" class="form-control" data-live-search="true" required>
            <option value="">Seleccione la empresa</option>
            @foreach($empresas as $empresa)
        <option value="{{$empresa->id}}" {{($empresa->id==old('empresa_id',$equipo->empresa->id ?? ''))?'selected':''}}>
                {{$empresa->razon_social}}
            </option>
            @endforeach
        </select>

    </div>
</div>
<div class="form-group row">
    <label for="oe" class="col-lg-3 col-form-label requerido">OE</label>
    <div class="col-lg-8">
        <input type="text" name="oe" id="oe" class="form-control" value="{{old('oe', $equipo->oe ?? '')}}" required/>
    </div>
</div>
<div class="form-group row">
    <label for="velocidad" class="col-lg-3 col-form-label requerido">Velocidad (m/s)</label>
    <div class="col-lg-8">
        <input type="text" name="velocidad" id="velocidad" class="form-control" value="{{old('velocidad', $equipo->velocidad ?? '')}}" required/>
    </div>
</div>
<div class="form-group row">
    <label for="paradas" class="col-lg-3 col-form-label requerido">Paradas</label>
    <div class="col-lg-8">
        <input type="text" name="paradas" id="paradas" class="form-control" value="{{old('paradas', $equipo->paradas ?? '')}}" required/>
    </div>
</div>
<div class="form-group row">
    <label for="carga" class="col-lg-3 col-form-label">Carga (kg)</label>
    <div class="col-lg-8">
        <input type="text" name="carga" id="carga" class="form-control" value="{{old('carga', $equipo->carga ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="marca" class="col-lg-3 col-form-label">Marca</label>
    <div class="col-lg-8">
        <input type="text" name="marca" id="marca" class="form-control" value="{{old('marca', $equipo->marca ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="modelo" class="col-lg-3 col-form-label">Modelo</label>
    <div class="col-lg-8">
        <input type="text" name="modelo" id="modelo" class="form-control" value="{{old('modelo', $equipo->modelo ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="accesos" class="col-lg-3 col-form-label">Accesos</label>
    <div class="col-lg-8">
        <input type="text" name="accesos" id="accesos" class="form-control" value="{{old('accesos', $equipo->accesos ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="cuarto_maquina" class="col-lg-3 col-form-label">Cuarto de máquina</label>
    <div class="col-lg-8">
        <input type="text" name="cuarto_maquina" id="cuarto_maquina" class="form-control" value="{{old('cuarto_maquina', $equipo->cuarto_maquina ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="plano" class="col-lg-3 control-form-label">Plano</label>
    <div class="col-lg-8">
        <input type="file" name="plano_up" id="plano" data-initial-preview="{{isset($equipo->plano) ? Storage::disk('s3')->url("files/planes/$equipo->plano") : "http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=Plano"}}" accept="application/pdf"/>
    </div>
</div>
