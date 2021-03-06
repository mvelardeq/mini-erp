<?php

namespace App\Models\Ventas;

use App\Models\Finanzas\Contabilidad\Asiento_contable;
use App\Models\Finanzas\Contabilidad\Asiento_cuenta;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table="factura";
    protected $fillable = ['concepto_pago_id', 'estado_factura_id', 'numero', 'fecha_facturacion', 'subtotal', 'total_con_igv', 'pago_sin_detraccion', 'obervacion'];
    protected $guarded = ['id'];

    public function concepto_pago()
    {
        return $this->belongsTo(Concepto_pago::class, 'concepto_pago_id');
    }
    public function estado_factura()
    {
        return $this->belongsTo(Estado_factura::class, 'estado_factura_id');
    }
    public function pagar_factura()
    {
        return $this->hasOne(Pagar_factura::class);
    }
    public function detraer_factura()
    {
        return $this->hasOne(Detraer_factura::class);
    }
    public function anular_factura()
    {
        return $this->hasOne(Anular_factura::class);
    }
    public function  asiento(){
        return $this->morphOne(Asiento_contable::class,'asientoable');
    }
}
