<?php

namespace App\Models\Operaciones;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table="equipo";
    protected $fillable = ['obra_id', 'oe', 'velocidad', 'paradas', 'carga', 'marca', 'modelo', 'accesos', 'cuarto_maquina', 'numero_equipo'];
    protected $guarded = ['id'];

    public function obra()
    {
        return $this->belongsTo(Obra::class, 'obra_id');
    }
}
