<?php

namespace App\Models\Operaciones;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table="empresa";
    protected $fillable = ['razon_social', 'ruc', 'pago_hora', 'direccion', 'actividad', 'porcentaje_detraccion', 'observacion'];
    protected $guarded = ['id'];

}
