<?php

namespace App\Models\Operaciones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado_gasto extends Model
{
    use HasFactory;
    protected $table="estado_gasto";
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];

}
