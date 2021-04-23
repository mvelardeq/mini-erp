<?php

namespace App\Models\Administracion\Logistica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria_producto extends Model
{
    use HasFactory;
    protected $table="categoria_producto";
    public $timestamps = false;
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];

}
