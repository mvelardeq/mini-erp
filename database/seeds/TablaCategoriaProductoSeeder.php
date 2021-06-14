<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaCategoriaProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoria_producto')->insert([
            'nombre' => 'Herramienta',
        ]);
        DB::table('categoria_producto')->insert([
            'nombre' => 'Equipo',
        ]);
        DB::table('categoria_producto')->insert([
            'nombre' => 'Seguridad',
        ]);
        DB::table('categoria_producto')->insert([
            'nombre' => 'Material de montaje',
        ]);
        DB::table('categoria_producto')->insert([
            'nombre' => 'Material de oficina',
        ]);
    }
}
