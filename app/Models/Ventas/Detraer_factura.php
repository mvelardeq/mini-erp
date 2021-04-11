<?php

namespace App\Models\Ventas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detraer_factura extends Model
{
    use HasFactory;
    protected $table="detraer_factura";
    protected $fillable = ['factura_id', 'pago_detraccion', 'fecha'];
    protected $guarded = ['id'];

    public function factura()
    {
        return $this->belongsTo(Factura::class);
    }
}
