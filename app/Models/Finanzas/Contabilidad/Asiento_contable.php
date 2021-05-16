<?php

namespace App\Models\Finanzas\Contabilidad;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asiento_contable extends Model
{
    use HasFactory;
    protected $table="asiento_contable";
    protected $fillable = ['fecha', 'glosa','asientoable_id','asientoable_type'];
    protected $guarded = ['id'];

    public function cuentas_contable(){
        return $this->belongsToMany(Cuenta_contable::class, 'asiento_cuenta')->withPivot('debe', 'haber');
    }

    public function asientoable(){
        return $this->morphTo();
    }
}
