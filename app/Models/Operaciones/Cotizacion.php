<?php

namespace App\Models\Operaciones;

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    protected $table="cotizacion";
    protected $fillable = ['equipo_id', 'numero', 'fecha', 'dirigido_a'];
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
