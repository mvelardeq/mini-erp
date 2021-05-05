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
    protected $table="producto";
    protected $fillable = ['categoria_producto_id', 'tipo_producto_id','descripcion', 'unidades', 'foto'];
    protected $guarded = ['id'];

    public function categoria_producto(){
        return $this->belongsTo(Categoria_producto::class, 'categoria_producto_id');
    }
    public function tipo_producto(){
        return $this->belongsTo(Tipo_producto::class, 'tipo_producto_id');
    }

    public static function setFoto($foto, $actual = false){
        if ($foto) {
            if ($actual) {
                Storage::disk('s3')->delete("photos/product/$actual");
            }
            $imageName = Str::random(20). '.jpg';
            $imagen = Image::make($foto)->encode('jpg', 75);
        $imagen->resize(500, 450, function ($constraint) {
                $constraint->upsize();
            });
            Storage::disk('s3')->put("photos/product/$imageName", $imagen->stream());
            return $imageName;
        } else {
            return false;
        }
    }

}
