<?php

namespace App\Models\Admin;

use App\Models\Seguridad\Trabajador;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class Obs_trabajador extends Model
{
    protected $table='obs_trabajador';
    protected $fillable = ['trabajador_id','titulo_observacion','observacion','fecha','foto'];
    protected $guarded = ['id'];

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'trabajador_id');
    }

    public static function setFoto($foto, $actual = false){
        if ($foto) {
            if ($actual) {
                Storage::disk('s3')->delete("photos/ObsPhoto/$actual");
            }
            $imageName = Str::random(20) . '.jpg';
            $imagen = Image::make($foto)->encode('jpg', 75);
        $imagen->resize(600, 800, function ($constraint) {
                $constraint->upsize();
            });
            Storage::disk('s3')->put("photos/ObsPhoto/$imageName", $imagen->stream());
            return $imageName;
        } else {
            return false;
        }
    }
}
