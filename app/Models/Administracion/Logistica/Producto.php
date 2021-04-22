<?php

namespace App\Models\Administracion\Logistica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table="producto";
    protected $fillable = ['categoria_producto_id', 'tipo_producto_id','descripcion', 'unidades', 'foto'];
    protected $guarded = ['id'];

    public function categoria_producto(){
        return $this->belongsTo(Categoria_producto::class, 'categoria_producto');
    }
    public function tipo_producto(){
        return $this->belongsTo(Tipo_producto::class, 'tipo_producto');
    }

}
