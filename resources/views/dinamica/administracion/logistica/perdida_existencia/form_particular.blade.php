
<div class="form-group row">
    <label for="item_compra_id" class="col-lg-3 col-form-label requerido">Producto</label>
    <div class="col-lg-8">
        <select name="item_compra_id" id="item_compra_id" class="selectpicker form-control" data-live-search="true" required>
            <option value="">Seleccione el producto</option>
            @foreach($productos_particulares as $producto_particular)
            <option value="{{$producto_particular->id}}" {{($producto_particular->id == old('producto_id',$perdida->item_compra->id ?? ''))?'selected':''}}>
                {{$producto_particular->producto->descripcion}} / {{$producto_particular->numero_serie}}
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
        <input type="number" step="0.01" name="cantidad" id="cantidad" class="form-control" value="1" disabled required/>
    </div>
</div>
