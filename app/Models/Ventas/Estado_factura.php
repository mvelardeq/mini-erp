<?php

namespace App\Models\Ventas;

use Illuminate\Database\Eloquent\Model;

class Estado_factura extends Model
{
    protected $table = "estado_factura";
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];

}
