<?php

namespace App\Models\Operaciones;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table="actividad";
    protected $fillable = ['servicio_id', 'nombre'];
    protected $guarded = ['id'];

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'servicio_id');
    }
}
