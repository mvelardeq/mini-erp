<?php

namespace App\Models\Operaciones;

use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    protected $table="obra";
    protected $fillable = ['nombre', 'direccion', 'cliente'];
    protected $guarded = ['id'];

    public function equipos()
    {
        return $this->HasMany(Equipo::class);
    }
    
}
