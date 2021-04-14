<?php

namespace App\Models\Operaciones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasto_trabajador extends Model
{
    use HasFactory;
    protected $table="gasto_trabajador";
    protected $fillable = ['ot_id', 'tipo_gasto_id', 'estado_gasto_id', 'pago'];
    protected $guarded = ['id'];

    public function tipo_gasto()
    {
        return $this->belongsTo(Tipo_gasto::class, 'tipo_gasto_id');
    }
    public function estado_gasto()
    {
        return $this->belongsTo(Estado_gasto::class, 'estado_gasto_id');
    }
}
