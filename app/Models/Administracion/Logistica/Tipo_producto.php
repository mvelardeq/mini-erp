<?php

namespace App\Models\Administracion\Logistica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_producto extends Model
{
    use HasFactory;
    protected $table="tipo_producto";
    public $timestamps = false;
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];

}
