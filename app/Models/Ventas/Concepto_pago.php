<?php

namespace App\Models\Ventas;

use Illuminate\Database\Eloquent\Model;

class Concepto_pago extends Model
{
    protected $table="concepto_pago";
    protected $fillable = ['contrato_id', 'estado_conceptopago_id', 'concepto', 'porcentaje'];
    protected $guarded = ['id'];

    public function contrato()
    {
        return $this->belongsTo(Contrato::class, 'contrato_id');
    }
    public function estado_conceptopago()
    {
        return $this->belongsTo(Estado_conceptopago::class, 'estado_conceptopago_id');
    }
}
