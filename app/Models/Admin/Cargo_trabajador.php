<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Cargo_trabajador extends Model
{
    protected $table = "ascenso_trabajador";
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];

}
