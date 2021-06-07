<?php

namespace App\Models\Social;

use App\Models\Seguridad\Trabajador;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
    protected $table = 'comentario';
    protected $fillable = ['trabajador_id','post_id', 'contenido'];
    protected $guarded = ['id'];

    public function trabajador(){
        return $this->belongsTo(Trabajador::class,'trabajador_id');
    }
    public function post(){
        return $this->belongsTo(Post::class,'post_id');
    }
}
