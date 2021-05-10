<?php

namespace App\Models\Administracion\Logistica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perdida_existencia extends Model
{
    use HasFactory;
    protected $table="perdida_existencia";
    protected $fillable = ['item_compra_id', 'fecha', 'motivo', 'cantidad'];
    protected $guarded = ['id'];

    public function item_compra(){
        return $this->belongsTo(Item_compra::class, 'item_compra_id');
    }

}
