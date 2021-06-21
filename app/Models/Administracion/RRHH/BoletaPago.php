<?php

namespace App\Models\Administracion\RRHH;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class BoletaPago extends Model
{
    use HasFactory;
    protected $table="boleta_pago";
    protected $fillable = ['trabajador_id', 'periodo','pago_mes', 'descuento_mes', 'adelantos'];
    protected $guarded = ['id'];

    public static function setBoleta($pdf, $name, $actual = false){
        if ($pdf) {
            if ($actual) {
                Storage::disk('s3')->delete("files/boleta/$actual");
            }
            // $planeName = Str::random(20) .'.pdf';
            Storage::disk('s3')->put("files/boleta/$name", $pdf);
            // return $name;
        } else {
            return false;
        }
    }

}
