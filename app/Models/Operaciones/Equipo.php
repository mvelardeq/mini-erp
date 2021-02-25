<?php

namespace App\Models\Operaciones;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Equipo extends Model
{
    protected $table="equipo";
    protected $fillable = ['obra_id', 'oe', 'velocidad', 'paradas', 'carga', 'marca', 'modelo', 'accesos', 'cuarto_maquina', 'numero_equipo', 'plano'];
    protected $guarded = ['id'];

    public function obra()
    {
        return $this->belongsTo(Obra::class, 'obra_id');
    }
    public static function setPlane($plane, $actual = false){
        if ($plane) {
            if ($actual) {
                Storage::disk('s3')->delete("files/planes/$actual");
            }
            $planeName = Str::random(14) .'.pdf';
            Storage::disk('s3')->put("files/planes/$planeName", file_get_contents($plane));
            return $planeName;
        } else {
            return false;
        }
    }
}
