<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EstadoFacturaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('estado_factura')->delete();
        
        \DB::table('estado_factura')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Emitida',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Por cobrar',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Cobrada',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Anulada',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
        ));
        
        
    }
}