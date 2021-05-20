<?php



use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaEstadoFacturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estado_factura')->insert([
            'nombre' => 'Emitida',
        ]);
        DB::table('estado_factura')->insert([
            'nombre' => 'Por cobrar',
        ]);
        DB::table('estado_factura')->insert([
            'nombre' => 'Cobrada',
        ]);
        DB::table('estado_factura')->insert([
            'nombre' => 'Anulada',
        ]);
    }
}
