<?php

namespace App\Models\Finanzas;

use App\Models\Finanzas\Contabilidad\Cuenta_contable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transferencia extends Model
{
    use HasFactory;
    protected $table="transferencia";
    protected $fillable = ['cuentaabono_id', 'cuentacargo_id', 'cantidad', 'fecha', 'observacion'];
    protected $guarded = ['id'];

    public function cuenta_abono()
    {
        return $this->belongsTo(Cuenta_contable::class,'cuentaabono_id');
    }
    public function cuenta_cargo()
    {
        return $this->belongsTo(Cuenta_contable::class,'cuentacargo_id');
    }

}
