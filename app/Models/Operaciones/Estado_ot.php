<?php

namespace App\Models\Operaciones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado_ot extends Model
{
    use HasFactory;
    protected $table="estado_ot";
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
}
