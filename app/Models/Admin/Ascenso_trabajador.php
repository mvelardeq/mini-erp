<?php

namespace App\Models\Admin;

use App\Models\Seguridad\Trabajador;
use Illuminate\Database\Eloquent\Model;

class Ascenso_trabajador extends Model
{
    protected $table = "ascenso_trabajador";
    protected $fillable = ['trabajador_id', 'cargo_trabajador_id', 'sueldo', 'fecha', 'observacion'];
    protected $guarded = ['id'];


    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'trabajador_id');
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo_trabajador::class, 'cargo_id');
    }
}
