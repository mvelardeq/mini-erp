
<div class="form-group row">
    <label for="producto_id" class="col-lg-3 col-form-label requerido">Producto</label>
    <div class="col-lg-8">
        <select name="producto_id" id="producto_id" class="selectpicker form-control" data-live-search="true" required>
            <option value="">Seleccione el producto</option>
            @foreach($productos_comunes as $producto_comun)
            <option value="{{$producto_comun->producto_id}}" {{($producto_comun->producto_id == old('producto_id',$perdida->item_compra->producto_id ?? ''))?'selected':''}}>
                {{$producto_comun->producto->descripcion}} ({{$producto_comun->producto->unidades}})
            </option>
            @endforeach
        </select>

    </div>
</div>
<div class="form-group row">
    <label for="fecha" class="col-lg-3 col-form-label">Fecha</label>
    <div class="col-lg-8">
        <input type="date" name="fecha" id="fecha" class="form-control" value="{{old('fecha', $perdida->fecha ?? '')}}" required/>
    </div>
</div>
<div class="form-group row">
    <label for="motivo" class="col-lg-3 col-form-label">Motivo</label>
    <div class="col-lg-8">
        <input type="text" name="motivo" id="motivo" class="form-control" value="{{old('motivo', $perdida->motivo ?? '')}}" required/>
    </div>
</div>
<div class="form-group row">
    <label for="cantidad" class="col-lg-3 col-form-label">Cantidad</label>
    <div class="col-lg-8">
        <input type="number" step="0.01" name="cantidad" id="cantidad" class="form-control" value="{{old('cantidad', $perdida->cantidad ?? '')}}" required/>
    </div>
</div>
