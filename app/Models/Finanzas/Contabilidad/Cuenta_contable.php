<?php

namespace App\Models\Finanzas\Contabilidad;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta_contable extends Model
{
    use HasFactory;
    protected $table="cuenta_contable";
    protected $fillable = ['codigo', 'nombre', 'saldo', 'banco', 'numero_cuenta', 'responsable_id'];
    protected $guarded = ['id'];
}
