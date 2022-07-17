<?php

namespace App\Models\Admin;

use App\Models\Seguridad\Trabajador;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class Obs_trabajador extends Model
{
    protected $table = 'obs_trabajador';
    protected $fillable = ['trabajador_id', 'titulo_observacion', 'observacion', 'fecha', 'foto'];
    protected $guarded = ['id'];

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'trabajador_id');
    }

    public static function setFoto($foto, $actual = false)
    {
        if ($foto) {
            if ($actual) {
                cloudinary()->destroy($actual);
            }
            $result = cloudinary()->upload(
                $foto->getRealPath(),
                [
                    'transformation' => [
                        'gravity' => 'auto',
                        'width' => 600,
                        'height' => 800,
                        'crop' => 'crop',
                    ],
                    'folder' => 'photos/ObsPhoto/'
                ]
            )->getSecurePath();
            return cloudinary()->getPublicId();
        } else {
            return false;
        }
    }
}
