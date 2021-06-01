<?php

namespace App\Models\Ventas;

use App\Models\Operaciones\Empresa;
use App\Models\Operaciones\Equipo;
use App\Models\Operaciones\Servicio;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table="contrato";
    protected $fillable = ['servicio_id', 'equipo_id', 'horas', 'costo_sin_igv', 'fecha_inicio', 'fecha_fin', 'estado', 'observacion', 'numero_oc', 'oc'];
    protected $guarded = ['id'];

    public function Conceptos_pago()
    {
        return $this->HasMany(Concepto_pago::class);
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'servicio_id');
    }
    
    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'equipo_id');
    }
}
