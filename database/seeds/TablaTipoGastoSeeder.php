<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaTipoGastoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoria_producto')->insert([
            'nombre' => 'Movilidad',
        ]);
        DB::table('categoria_producto')->insert([
            'nombre' => 'Cena',
        ]);
        DB::table('categoria_producto')->insert([
            'nombre' => 'Movilidad y cena',
        ]);
    }
}
