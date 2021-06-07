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
    protected $fillable = ['trabajador_id','foto', 'descripcion'];
    protected $guarded = ['id'];

    public function trabajador(){
        return $this->belongsTo(Trabajador::class,'trabajador_id');
    }

    public function likes(){
        return $this->hasMany(Likes::class);
    }

    public function comentarios(){
        return $this->hasMany(Comentario::class);
    }

    public static function setFoto($foto, $actual = false){
        if ($foto) {
            if ($actual) {
                Storage::disk('s3')->delete("photos/postPhoto/$actual");
            }
            $imageName = Str::random(14) . '.jpg';
            $imagen = Image::make($foto)->encode('jpg', 75);
        $imagen->resize(600, 800, function ($constraint) {
                $constraint->upsize();
            });
            Storage::disk('s3')->put("photos/postPhoto/$imageName", $imagen->stream());
            return $imageName;
        } else {
            return false;
        }
    }
}
