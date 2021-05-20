<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaEstadoConceptoPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estado_conceptopago')->insert([
            'nombre' => 'Sin Facturar',
        ]);
        DB::table('estado_conceptopago')->insert([
            'nombre' => 'Facturado',
        ]);
        DB::table('estado_conceptopago')->insert([
            'nombre' => 'Pagado',
        ]);
    }
}
