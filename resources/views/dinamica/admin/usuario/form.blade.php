<div class="form-group row">
    <label for="primer_nombre" class="col-lg-3 col-form-label requerido">Primer nombre</label>
    <div class="col-lg-8">
        <input type="text" name="primer_nombre" id="primer_nombre" class="form-control"
            value="{{ old('primer_nombre', $data->primer_nombre ?? '') }}" required />
    </div>
</div>
<div class="form-group row">
    <label for="segundo_nombre" class="col-lg-3 col-form-label">Segundo nombre</label>
    <div class="col-lg-8">
        <input type="text" name="segundo_nombre" id="segundo_nombre" class="form-control"
            value="{{ old('segundo_nombre', $data->segundo_nombre ?? '') }}" />
    </div>
</div>
<div class="form-group row">
    <label for="primer_apellido" class="col-lg-3 col-form-label requerido">Primer apellido</label>
    <div class="col-lg-8">
        <input type="text" name="primer_apellido" id="primer_apellido" class="form-control"
            value="{{ old('primer_apellido', $data->primer_apellido ?? '') }}" required />
    </div>
</div>
<div class="form-group row">
    <label for="segundo_apellido" class="col-lg-3 col-form-label requerido">Segundo apellido</label>
    <div class="col-lg-8">
        <input type="text" name="segundo_apellido" id="segundo_apellido" class="form-control"
            value="{{ old('segundo_apellido', $data->segundo_apellido ?? '') }}" required />
    </div>
</div>
<div class="form-group row">
    <label for="nombres" class="col-lg-3 col-form-label requerido">Dni</label>
    <div class="col-lg-8">
        <input type="text" name="dni" id="dni" class="form-control"
            value="{{ old('dni', $data->dni ?? '') }}" required />
    </div>
</div>
<div class="form-group row">
    <label for="correo" class="col-lg-3 col-form-label requerido">Correo</label>
    <div class="col-lg-8">
        <input type="email" name="correo" id="correo" class="form-control"
            value="{{ old('correo', $data->correo ?? '') }}" required />
    </div>
</div>
<div class="form-group row">
    <label for="usuario" class="col-lg-3 col-form-label requerido">Usuarios</label>
    <div class="col-lg-8">
        <input type="text" name="usuario" id="usuario" class="form-control"
            value="{{ old('usuario', $data->usuario ?? '') }}" autocomplete="off" required />
    </div>
</div>
<div class="form-group row">
    <label for="password" class="col-lg-3 col-form-label {{ !isset($data) ? 'requerido' : '' }}">Contraseña</label>
    <div class="col-lg-8">
        <input type="password" name="password" id="password" class="form-control" value=""
            {{ !isset($data) ? 'required' : '' }} autocomplete="new-password" />
    </div>
</div>
<div class="form-group row">
    <label for="re_password" class="col-lg-3 col-form-label {{ !isset($data) ? 'requerido' : '' }}">Repita
        Contraseña</label>
    <div class="col-lg-8">
        <input type="password" name="re_password" id="re_password" class="form-control" value=""
            {{ !isset($data) ? 'required' : '' }} />
    </div>
</div>
<div class="form-group row">
    <label for="rol_id" class="col-lg-3 col-form-label requerido">Rol</label>
    <div class="col-lg-8">
        <select name="rol_id[]" id="rol_id" class="form-control" multiple required>
            <option value="">Seleccione el rol</option>
            @foreach ($rols as $id => $nombre)
                <option value="{{ $id }}"
                    {{ is_array(old('rol_id')) ? (in_array($id, old('rol_id')) ? 'selected' : '') : (isset($data) ? ($data->roles->firstWhere('id', $id) ? 'selected' : '') : '') }}>
                    {{ $nombre }}
                </option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="direccion" class="col-lg-3 col-form-label">Dirección</label>
    <div class="col-lg-8">
        <input type="text" name="direccion" id="direccion" class="form-control"
            value="{{ old('direccion', $data->direccion ?? '') }}" />
    </div>
</div>
<div class="form-group row">
    <label for="celular" class="col-lg-3 col-form-label">Celular</label>
    <div class="col-lg-8">
        <input type="text" name="celular" id="celular" class="form-control"
            value="{{ old('celular', $data->celular ?? '') }}" />
    </div>
</div>
<div class="form-group row">
    <label for="fecha_nacimiento" class="col-lg-3 col-form-label">Fecha de nacimiento</label>
    <div class="col-lg-8">
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control"
            value="{{ old('fecha_nacimiento', $data->fecha_nacimiento ?? '') }}" />
    </div>
</div>
<div class="form-group row">
    <label for="botas" class="col-lg-3 col-form-label">Botas</label>
    <div class="col-lg-8">
        <input type="text" name="botas" id="botas" class="form-control"
            value="{{ old('botas', $data->botas ?? '') }}" />
    </div>
</div>
<div class="form-group row">
    <label for="overol" class="col-lg-3 col-form-label">Overol</label>
    <div class="col-lg-8">
        <input type="text" name="overol" id="overol" class="form-control"
            value="{{ old('overol', $data->overol ?? '') }}" />
    </div>
</div>
<div class="form-group row">
    <label for="overol" class="col-lg-3 col-form-label">Supervisor</label>
    <div class="col-lg-8">
        <select name="supervisor_id" id="supervisor_id" class="selectpicker form-control" data-live-search="true">
            <option value="">Seleccione el supervisor</option>
            @foreach ($supervisores as $supervisor)
                <option value="{{ $supervisor->id }}"
                    {{ $supervisor->id == old('supervisor_id', $data->supervisor_id ?? '') ? 'selected' : '' }}>
                    {{ $supervisor->primer_nombre }} {{ $supervisor->primer_apellido }}
                </option>
            @endforeach
        </select>
    </div>
</div>

{{-- {{ dd($data->foto) }} --}}
<div class="form-group row">
    <label for="foto" class="col-lg-3 control-form-label">Foto</label>
    <div class="col-lg-8">
        <input type="file" name="foto_up" id="foto"
            data-initial-preview="{{ isset($data->foto) ? cloudinary()->getUrl($data->foto) : 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=Caratula+Libro' }}"
            accept="image/*" />
    </div>
</div>

{{-- {{dd(old('usuario'))}} --}}
