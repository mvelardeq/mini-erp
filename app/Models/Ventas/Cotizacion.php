<?php

namespace App\Models\Ventas;

use App\Models\Operaciones\Equipo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Cotizacion extends Model
{
    protected $table="cotizacion";
    protected $fillable = ['equipo_id', 'numero', 'resumen', 'fecha', 'dirigido_a', 'pdf'];
    protected $guarded = ['id'];

    public function lineas_cotizacion()
    {
        return $this->HasMany(Linea_cotizacion::class);
    }

    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'equipo_id');
    }

    public static function setQuotation($pdf, $name, $actual = false){
        if ($pdf) {
            if ($actual) {
                Storage::disk('s3')->delete("files/quotation/$name");
            }
            // $planeName = Str::random(20) .'.pdf';
            Storage::disk('s3')->put("files/quotation/$name", $pdf);
            // return $name;
        } else {
            return false;
        }
    }
}
