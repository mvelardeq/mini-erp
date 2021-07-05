<div class="form-group row">
    <div class="col-lg-3">
        <label for="" class="py-0 col-form-label">Tipo de producto</label>
    </div>
    <div class="col-lg-8 form-check">
        <div class="">
            <input type="radio" name="tipo_producto_id" id="activo_comun" class="form-check-input" value="1"/>
        </div>
        <label for="activo_comun" class="form-check-label">Activo común</label>

        <div class="">
            <input type="radio" name="tipo_producto_id" id="activo_particular" class="form-check-input" value="2"/>
        </div>
        <label for="activo_particular" class="form-check-label">Activo particular</label>

        <div class="">
            <input type="radio" name="tipo_producto_id" id="consumible" class="form-check-input" value="3"/>
        </div>
        <label for="consumible" class="form-check-label">Consumible</label>
    </div>

</div>
<div class="form-group row">
    <label for="categoria_producto_id" class="col-lg-3 col-form-label requerido">Categoría</label>
    <div class="col-lg-8">
        <select name="categoria_producto_id" id="categoria_producto_id" class="selectpicker form-control" data-live-search="true" required>
            <option value="">Seleccione la categoría</option>
            @foreach($categorias_producto as $categoria_producto)
            <option value="{{$categoria_producto->id}}" {{($categoria_producto->id==old('categoria_producto_id',$producto->categoria_producto_id->id ?? ''))?'selected':''}}>
                {{$categoria_producto->nombre}}
            </option>
            @endforeach
        </select>

    </div>
</div>
<div class="form-group row">
    <label for="descripcion" class="col-lg-3 col-form-label requerido">Descripción</label>
    <div class="col-lg-8">
        <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{old('descripcion', $producto->descripcion ?? '')}}" required/>
    </div>
</div>

<div class="form-group row">
    <label for="unidades" class="col-lg-3 col-form-label requerido">Unidades</label>
    <div class="col-lg-8">
        <select name="unidades" id="unidades" class="form-control" required>
            <option value="">Seleccione la unidad de medida</option>
            <option value="und">und</option>
            <option value="kg">kg</option>
            <option value="kg">m</option>
            <option value="kg">millar</option>
            <option value="lt">lt</option>
            <option value="gal">gal</option>
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-lg-3 control-form-label">Foto</label>
    <div class="col-lg-8">
        {{-- <input type="file" name="foto_up" id="foto" data-initial-preview="{{isset($data->imagen) ? Storage::url("imagenes/caratulas/$data->imagen") : "http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=Caratula+Libro"}}" accept="image/*"/> --}}
        <input type="file" name="foto_producto" id="foto" data-initial-preview="{{isset($producto->foto) ? Storage::disk('s3')->url("photos/product/$producto->foto") : "http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=Foto+Producto"}}" accept="image/*"/>
    </div>
</div>
