<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaEstadoGastoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estado_gasto')->insert([
            'nombre' => 'Inmediato',
        ]);
        DB::table('estado_gasto')->insert([
            'nombre' => 'Mensual',
        ]);
    }
}
