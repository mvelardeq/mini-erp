<div class="form-group row">
    <label for="nombre" class="col-lg-3 col-form-label">Categoría</label>
    <div class="col-lg-8">
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $categoria_producto->nombre ?? '')}}"/>
    </div>
</div>
