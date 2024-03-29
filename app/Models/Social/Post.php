<?php

namespace App\Models\Social;

use App\Models\Seguridad\Trabajador;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;
    protected $table = 'post';
    protected $fillable = ['trabajador_id', 'foto', 'descripcion'];
    protected $guarded = ['id'];

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'trabajador_id');
    }

    public function likes()
    {
        return $this->hasMany(Likes::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class)->orderBy('created_at', 'desc');
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
                        // 'gravity' => 'auto',
                        'width' => 800,
                        // 'height' => 800,
                        'crop' => 'scale',
                    ],
                    'folder' => 'photos/postPhoto/'
                ]
            )->getSecurePath();
            return cloudinary()->getPublicId();
        } else {
            return false;
        }
    }
}
