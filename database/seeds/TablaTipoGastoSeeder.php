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
        DB::table('tipo_gasto')->insert([
            'nombre' => 'Movilidad',
        ]);
        DB::table('tipo_gasto')->insert([
            'nombre' => 'Cena',
        ]);
        DB::table('tipo_gasto')->insert([
            'nombre' => 'Movilidad y cena',
        ]);
    }
}
