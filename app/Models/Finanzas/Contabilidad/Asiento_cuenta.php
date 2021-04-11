<?php

namespace App\Models\Finanzas\Contabilidad;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asiento_cuenta extends Model
{
    use HasFactory;
    protected $table="asiento_cuenta";
    protected $fillable = ['cuentacontable_id', 'asientocontable_id', 'debe', 'haber'];
    protected $guarded = ['id'];
}
