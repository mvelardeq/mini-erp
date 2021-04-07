<?php

namespace App\Models\Ventas;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table="factura";
    protected $fillable = ['concepto_pago_id', 'estado_factura_id', 'numero', 'fecha_facturacion', 'obervacion', 'fecha_pago', 'pago', 'fecha_detraccion', 'pago_detraccion', 'fecha_anulacion', 'motivo_anulacion'];
    protected $guarded = ['id'];

    public function concepto_pago()
    {
        return $this->belongsTo(Concepto_pago::class, 'concepto_pago_id');
    }
    public function estado_factura()
    {
        return $this->belongsTo(Estado_factura::class, 'estado_factura_id');
    }
}
