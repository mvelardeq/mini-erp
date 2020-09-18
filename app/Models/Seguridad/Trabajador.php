<?php

namespace App\Models\Seguridad;

use App\Models\Admin\Rol;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Trabajador extends Authenticatable
{
    protected $remeber_token = false;
    protected $table = 'trabajador';
    protected $fillable = ['usuario', 'password', 'nombres','apellidos', 'correo', 'dni', 'direccion','celular', 'fecha_nacimiento','foto', 'botas', 'overol',];

    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'trabajador_rol');
    }

    public function setSession($roles)
    {
        Session::put([
            'usuario' => $this->usuario,
            'trabajador_id' => $this->id,
            'nombre_trabajador' => $this->nombres
        ]);
        if (count($roles) == 1) {
            Session::put(
                [
                    'rol_id' => $roles[0]['id'],
                    'rol_nombre' => $roles[0]['nombre'],
                ]
            );
        }else {
            Session::put('roles', $roles);
        }
    }

    public function setPasswordAttribute($pass)
    {
        $this->attributes['password'] = Hash::make($pass);
    }
}
