<?php

namespace App\Models\Administracion\Logistica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    protected $table="compra";
    protected $fillable = ['proveedor', 'fecha', 'total_con_igv','ruc_proveedor', 'observacion'];
    protected $guarded = ['id'];

    public function producto(){
        return $this->belongsToMany(Producto::class, 'item_compra')->withPivot('costo_con_igv', 'cantidad', 'capacidad', 'numero_serie', 'marca', 'modelo');
    }
    public function  asiento(){
        return $this->morphOne(Asiento_cuenta::class,'asientoable');
    }

}
