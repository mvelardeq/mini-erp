<?php

namespace App\Models\Operaciones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ot_actividad extends Model
{
    use HasFactory;
    protected $table="ot_actividad";
    protected $fillable = ['ot_id', 'actividad_id', 'horas'];
    protected $guarded = ['id'];

}
