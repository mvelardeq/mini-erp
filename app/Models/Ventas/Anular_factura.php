<?php

namespace App\Models\Ventas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anular_factura extends Model
{
    use HasFactory;
    protected $table="anular_factura";
    protected $fillable = ['factura_id', 'motivo', 'fecha'];
    protected $guarded = ['id'];

    public function factura()
    {
        return $this->belongsTo(Factura::class);
    }
}
