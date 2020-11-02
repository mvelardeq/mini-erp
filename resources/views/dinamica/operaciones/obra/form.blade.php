<div class="form-group row">
    <label for="nombre" class="col-lg-3 col-form-label requerido">Nombre</label>
    <div class="col-lg-8">
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $obra->nombre ?? '')}}" required/>
    </div>
</div>
<div class="form-group row">
    <label for="direccion" class="col-lg-3 col-form-label">Dirección</label>
    <div class="col-lg-8">
        <input type="text" name="direccion" id="direccion" class="form-control" value="{{old('direccion', $obra->direccion ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="cliente" class="col-lg-3 col-form-label requerido">Cliente</label>
    <div class="col-lg-8">
        <input type="text" name="cliente" id="cliente" class="form-control" value="{{old('cliente', $obra->cliente ?? '')}}" required/>
    </div>
</div>
