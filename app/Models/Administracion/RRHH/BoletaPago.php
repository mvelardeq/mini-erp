<?php

namespace App\Models\Administracion\RRHH;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoletaPago extends Model
{
    use HasFactory;
    protected $table="boleta_pago";
    protected $fillable = ['trabajador_id', 'periodo','pago_mes', 'descuento', 'adelanto'];
    protected $guarded = ['id'];

    
}
