<?php

namespace App\Models\Administracion\Logistica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_compra extends Model
{
    use HasFactory;
    protected $table="item_compra";
    protected $fillable = ['compra_id', 'producto_id','costo_con_igv', 'cantidad','capacidad', 'numero_serie', 'marca', 'modelo'];
    protected $guarded = ['id'];

}
