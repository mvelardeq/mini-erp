<?php

namespace App\Models\Ventas;

use Illuminate\Database\Eloquent\Model;

class Estado_conceptopago extends Model
{
    protected $table = "estado_conceptopago";
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];

}
