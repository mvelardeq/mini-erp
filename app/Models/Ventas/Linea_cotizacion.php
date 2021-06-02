<?php

namespace App\Models\Ventas;

use Illuminate\Database\Eloquent\Model;

class Linea_cotizacion extends Model
{
    protected $table="linea_cotizacion";
    protected $fillable = ['cotizacion_id', 'descripcion', 'cantidad', 'subtotal'];
    protected $guarded = ['id'];

    public function equipo()
    {
        return $this->belongsTo(Cotizacion::class, 'cotizacion_id');
    }
}
