<?php

namespace App\Models\Administracion\Logistica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    protected $table="compra";
    protected $fillable = ['producto_id', 'fecha','costo_con_igv', 'proveedor', 'cantidad', 'numero_serie', 'marca', 'modelo'];
    protected $guarded = ['id'];

    public function producto(){
        return $this->belongsTo(Producto::class, 'producto_id');
    }

}
