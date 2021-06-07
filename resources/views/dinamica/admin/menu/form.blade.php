<div class="form-group row">
    <label for="nombre" class="col-lg-3 col-form-label">Nombre</label>
    <div class="col-lg-8">
    <input type="text" name="nombre" class="form-control" id="nombre" required value="{{old('nombre', $data->nombre ?? '')}}">
    </div>
</div>
<div class="form-group row">
    <label for="url" class="col-lg-3 col-form-label">Url</label>
    <div class="col-lg-8">
    <input type="text" name="url" class="form-control" id="url" required value="{{old('url', $data->url ?? '')}}">
    </div>
</div>
<div class="form-group row">
    <label for="icono" class="col-lg-3 col-form-label">Icono</label>
    <div class="col-lg-8">
    <input type="text" name="icono" class="form-control" id="icono" required value="{{old('icono', $data->icono ?? '')}}">
    </div>
    <div class="col-lg-1">
        <span id="mostrar-icono" class="fas fa-{{old('icono')}}"></span>
    </div>
</div>
