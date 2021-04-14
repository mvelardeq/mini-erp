<?php

namespace App\Models\Operaciones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adelanto_trabajador extends Model
{
    use HasFactory;
    protected $table="adelanto_trabajador";
    protected $fillable = ['ot_id', 'pago'];
    protected $guarded = ['id'];

}
