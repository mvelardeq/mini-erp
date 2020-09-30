<?php

namespace App\Models\Admin;

use App\Models\Seguridad\Trabajador;
use Illuminate\Database\Eloquent\Model;

class Periodo_trabajador extends Model
{
    protected $table='periodo_trabajador';
    protected $fillable = ['trabajador_id','fecha_inicio','fecha_fin'];
    protected $guarded = ['id'];

    public function trabajadores()
    {
        return $this->belongsTo(Trabajador::class, 'trabajador_id');
    }
}
