<?php

namespace App\Models\Operaciones;

use App\Models\Seguridad\Trabajador;
use App\Models\Ventas\Contrato;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ot extends Model
{
    use HasFactory;
    protected $table="ot";
    protected $fillable = ['trabajador_id', 'contrato_id', 'estado_ot_id', 'fecha', 'adelanto', 'descuento', 'aprobacion_ot', 'pedido'];
    protected $guarded = ['id'];

    public function actividades(){
        return $this->belongsToMany(Actividad::class, 'ot_actividad');
    }

    public function trabajdor()
    {
        return $this->belongsTo(Trabajador::class, 'trabajdor_id');
    }
    public function contrato()
    {
        return $this->belongsTo(Contrato::class, 'contrato_id');
    }
    public function estado_ot()
    {
        return $this->belongsTo(Estado_ot::class, 'estado_ot_id');
    }
}
