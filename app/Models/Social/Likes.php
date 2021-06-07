<?php

namespace App\Models\Social;

use App\Models\Seguridad\Trabajador;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    use HasFactory;
    protected $table = 'likes';
    protected $fillable = ['trabajador_id','post_id'];
    protected $guarded = ['id'];

    public function trabajador(){
        return $this->belongsTo(Trabajador::class,'trabajador_id');
    }
    public function posts(){
        return $this->belongsTo(Post::class,'post_id');
    }
}
