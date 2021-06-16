<?php

namespace App\Models\Administracion\RRHH;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quincena extends Model
{
    use HasFactory;
    protected $table="quincena";
    protected $fillable = ['trabajador_id', 'periodo','pago'];
    protected $guarded = ['id'];

}
