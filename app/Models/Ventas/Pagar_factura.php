<?php

namespace App\Models\Ventas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagar_factura extends Model
{
    use HasFactory;
    protected $table="pagar_factura";
    protected $fillable = ['factura_id', 'pago', 'fecha'];
    protected $guarded = ['id'];

    public function factura()
    {
        return $this->belongsTo(Factura::class);
    }
}
