<?php

namespace App\Models\Finanzas\Contabilidad;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asiento_cuenta extends Model
{
    use HasFactory;
    protected $table="asiento_cuenta";
    protected $fillable = ['cuenta_contable_id', 'asiento_contable_id', 'debe', 'haber'];
    protected $guarded = ['id'];
}
