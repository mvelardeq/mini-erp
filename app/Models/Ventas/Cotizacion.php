<?php

namespace App\Models\Ventas;

use App\Models\Operaciones\Equipo;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    protected $table="cotizacion";
    protected $fillable = ['equipo_id', 'numero', 'resumen', 'fecha', 'dirigido_a'];
    protected $guarded = ['id'];

    public function lineas_cotizacion()
    {
        return $this->HasMany(Linea_cotizacion::class);
    }

    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'equipo_id');
    }
}
