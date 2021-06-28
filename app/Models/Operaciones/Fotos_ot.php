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
    protected $table="fotos_ot";
    protected $fillable = ['ot_id', 'foto'];
    protected $guarded = ['id'];

    public static function setFoto($foto, $actual = false){
        if ($foto) {
            if ($actual) {
                Storage::disk('s3')->delete("photos/otPhoto/$actual");
            }
            $imageName = Str::random(14) . '.jpg';
            $imagen = Image::make($foto)->encode('jpg', 75);
        $imagen->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            Storage::disk('s3')->put("photos/otPhoto/$imageName", $imagen->stream());
            return $imageName;
        } else {
            return false;
        }
    }

}
