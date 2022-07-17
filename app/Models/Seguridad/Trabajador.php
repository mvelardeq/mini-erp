<?php

namespace App\Models\Seguridad;

use App\Models\Admin\Ascenso_trabajador;
use App\Models\Admin\Obs_trabajador;
use App\Models\Admin\Periodo_trabajador;
use App\Models\Admin\Rol;
use App\Models\Administracion\RRHH\BoletaPago;
use App\Models\Administracion\RRHH\Quincena;
use App\Models\Operaciones\Ot;
use App\Models\Social\Comentario;
use App\Models\Social\Likes;
use App\Models\Social\Post;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class Trabajador extends Authenticatable
{
    protected $remeber_token = false;
    protected $table = 'trabajador';
    protected $fillable = ['usuario', 'password', 'primer_nombre', 'segundo_nombre', 'primer_apellido', 'segundo_apellido', 'correo', 'dni', 'direccion', 'celular', 'fecha_nacimiento', 'foto', 'botas', 'overol', 'supervisor_id'];

    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'trabajador_rol');
    }

    public function observaciones()
    {
        return $this->HasMany(Obs_trabajador::class);
    }
    public function boleta_pago()
    {
        return $this->HasMany(BoletaPago::class);
    }
    public function quincena()
    {
        return $this->HasMany(Quincena::class);
    }
    public function ots()
    {
        return $this->HasMany(Ot::class);
    }

    public function periodos()
    {
        return $this->HasMany(Periodo_trabajador::class);
    }

    public function ascensos()
    {
        return $this->HasMany(Ascenso_trabajador::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function likes()
    {
        return $this->hasMany(Likes::class);
    }

    public function setSession($roles)
    {
        Session::put([
            // 'usuario' => $this->usuario,
            'trabajador_id' => $this->id,
            'nombre_trabajador' => $this->primer_nombre . " " . $this->primer_apellido,
            // 'foto' => $this->foto
        ]);
        if (count($roles) == 1) {
            Session::put(
                [
                    'rol_id' => $roles[0]['id'],
                    'rol_nombre' => $roles[0]['nombre'],
                ]
            );
        } else {
            Session::put('roles', $roles);
        }
    }

    public function setPasswordAttribute($pass)
    {
        $this->attributes['password'] = Hash::make($pass);
    }

    public static function setFoto($foto, $actual = false)
    {
        if ($foto) {
            if ($actual) {
                cloudinary()->destroy($actual);
                // Storage::disk('s3')->delete("photos/profilePhoto/$actual");
            }
            /* $imageName = Str::random(14) . '.jpg';
            $imagen = Image::make($foto)->encode('jpg', 75);
            $imagen->resize(600, 800, function ($constraint) {
                $constraint->upsize();
            });
            dd($imagen->stream()); */
            $result = cloudinary()->upload(
                $foto->getRealPath(),
                [
                    'transformation' => [
                        'gravity' => 'auto',
                        'width' => 600,
                        'height' => 800,
                        'crop' => 'crop',
                    ],
                    'folder' => 'photos/profilePhoto/'
                ]
            )->getSecurePath();
            // $result = $imagen->stream()->storeOnCloudinary('photos/profilePhoto/');
            // Storage::disk('s3')->put("photos/profilePhoto/$imageName", $imagen->stream());
            // dd(cloudinary()->getPublicId());
            return cloudinary()->getPublicId();
            // return $imageName;
        } else {
            return false;
        }
    }
}
