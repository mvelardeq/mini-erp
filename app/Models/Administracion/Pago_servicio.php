<?php

namespace App\Models\Administracion;

use App\Models\Finanzas\Contabilidad\Asiento_cuenta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago_servicio extends Model
{
    use HasFactory;
    protected $table="pago_servicio";
    protected $fillable = ['servicio_tercero_id', 'pago','fecha_pago', 'proveedor', 'ruc_proveedor','observacion'];
    protected $guarded = ['id'];

    public function servicio_tercero(){
        return $this->belongsTo(Servicio_tercero::class,'servicio_tercero_id');
    }
    public function asiento(){
        return $this->morphOne(Asiento_cuenta::class,'asientoable');
    }
}
