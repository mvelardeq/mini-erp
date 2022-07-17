<?php

namespace App\Models\Operaciones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Fotos_ot extends Model
{
    use HasFactory;
    protected $table = "fotos_ot";
    protected $fillable = ['ot_id', 'foto'];
    protected $guarded = ['id'];

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
                        'height' => 600,
                        'crop' => 'crop',
                    ],
                    'folder' => 'photos/otPhoto/'
                ]
            )->getSecurePath();
            return cloudinary()->getPublicId();
        } else {
            return false;
        }
    }
}
