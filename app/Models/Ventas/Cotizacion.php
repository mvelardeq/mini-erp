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
        // return var_dump($pdf);
        if ($pdf) {
            if ($actual) {
                Storage::disk('cloudinary')->delete("files/quotation/$name");
            }
            Storage::disk('cloudinary')->put("files/quotation/$name", $pdf);
        } else {
            return false;
        }

    }
}
