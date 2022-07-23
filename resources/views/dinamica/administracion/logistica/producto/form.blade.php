<div class="form-group row">
    <div class="col-lg-3">
        <label for="" class="py-0 col-form-label">Tipo de producto</label>
    </div>
    <div class="col-lg-8 form-check">
        @foreach ($tipo_productos as $tipo_producto)
            <div class="">
                <input type="radio" name="tipo_producto_id" id="{{$tipo_producto->nombre}}" class="form-check-input" value="{{ $tipo_producto->id }}" {{ old('tipo_producto_id', $producto->tipo_producto_id ?? '')==$tipo_producto->id ? 'checked' : '' }}/>
            </div>
            <label for="{{$tipo_producto->nombre}}" class="form-check-label">{{$tipo_producto->nombre}}</label>
        @endforeach
    </div>
</div>

<div class="form-group row">
    <label for="categoria_producto_id" class="col-lg-3 col-form-label requerido">Categoría</label>
    <div class="col-lg-8">
        <select name="categoria_producto_id" id="categoria_producto_id" class="form-control"
            data-live-search="true" required>
            <option value="">Seleccione la categoría</option>
            @foreach ($categorias_producto as $categoria_producto)
                <option value="{{ $categoria_producto->id }}"
                    {{ $categoria_producto->id == old('categoria_producto_id', $producto->categoria_producto_id ?? '') ? 'selected' : '' }}>
                    {{ $categoria_producto->nombre }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="descripcion" class="col-lg-3 col-form-label requerido">Descripción</label>
    <div class="col-lg-8">
        <input type="text" name="descripcion" id="descripcion" class="form-control"
            value="{{ old('descripcion', $producto->descripcion ?? '') }}" required />
    </div>
</div>

<div class="form-group row">
    <label for="unidades" class="col-lg-3 col-form-label requerido">Unidades</label>
    <div class="col-lg-8">
        <select name="unidades" id="unidades" class="form-control" required>
            <option value="">Seleccione la unidad de medida</option>
            <option value="und" {{ old('unidades', ($producto->unidades ?? '') == 'und') ? 'selected' : '' }}>und</option>
            <option value="kg" {{ old('unidades', ($producto->unidades ?? '') == 'kg') ? 'selected' : '' }}>kg</option>
            <option value="m" {{ old('unidades', ($producto->unidades ?? '') == 'm') ? 'selected' : '' }}>m</option>
            <option value="millar" {{ old('unidades', ($producto->unidades ?? '') == 'millar') ? 'selected' : '' }}>millar</option>
            <option value="lt" {{ old('unidades', ($producto->unidades ?? '') == 'lt') ? 'selected' : '' }}>lt</option>
            <option value="gal" {{ old('unidades', ($producto->unidades ?? '') == 'gal') ? 'selected' : '' }}>gal</option>
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="" class="col-lg-3 control-form-label requerido">Foto</label>
    <div class="col-lg-8">
        <input type="file" name="foto_producto" id="foto" value="{{ old('foto_producto', $producto->foto ?? '') }}" data-initial-preview="{{ isset($producto->foto) ? cloudinary()->getUrl($producto->foto) : 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=Foto+Producto' }}"
            accept="image/*" />
    </div>
</div>
