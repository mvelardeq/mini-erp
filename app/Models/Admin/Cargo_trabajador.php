<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Cargo_trabajador extends Model
{
    protected $table = "cargo_trabajador";
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];

    public function ascensos(){
        return $this->belongsTo(Ascenso_trabajador::class);
    }
}
