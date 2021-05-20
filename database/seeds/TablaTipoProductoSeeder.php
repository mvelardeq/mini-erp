<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaTipoProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_producto')->insert([
            'nombre' => 'Activo común',
        ]);
        DB::table('tipo_producto')->insert([
            'nombre' => 'Activo particular',
        ]);
        DB::table('tipo_producto')->insert([
            'nombre' => 'Consumible',
        ]);
    }
}
