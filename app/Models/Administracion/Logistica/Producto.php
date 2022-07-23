<?php

namespace App\Models\Administracion\Logistica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Producto extends Model
{
    use HasFactory;
    protected $table = "producto";
    protected $fillable = ['categoria_producto_id', 'tipo_producto_id', 'descripcion', 'unidades', 'foto'];
    protected $guarded = ['id'];

    public function categoria_producto()
    {
        return $this->belongsTo(Categoria_producto::class, 'categoria_producto_id');
    }
    public function tipo_producto()
    {
        return $this->belongsTo(Tipo_producto::class, 'tipo_producto_id');
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
                    'folder' => 'photos/product/'
                ]
            )->getSecurePath();
            return cloudinary()->getPublicId();
        } else {
            return false;
        }
    }
}
