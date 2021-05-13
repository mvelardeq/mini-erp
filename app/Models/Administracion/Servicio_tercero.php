<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio_tercero extends Model
{
    use HasFactory;
    protected $table="servicio_tercero";
    protected $fillable = ['nombre', 'dirigido_a'];
    protected $guarded = ['id'];
}
