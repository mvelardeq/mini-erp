<?php

namespace App\Models\Operaciones;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table="servicio";
    protected $fillable = ['nombre', 'observacion'];
    protected $guarded = ['id'];

    public function actividades()
    {
        return $this->HasMany(Actividad::class);
    }
}
