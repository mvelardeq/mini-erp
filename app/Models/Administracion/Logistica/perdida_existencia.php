<?php

namespace App\Models\Administracion\Logistica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perdida_existencia extends Model
{
    use HasFactory;
    protected $table="perdida_existencia";
    protected $fillable = ['producto_id', 'motivo','descripcion', 'cantidad'];
    protected $guarded = ['id'];

    public function producto(){
        return $this->belongsTo(Producto::class, 'producto_id');
    }

}
