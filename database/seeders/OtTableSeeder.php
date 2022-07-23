<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OtTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ot')->delete();
        
        \DB::table('ot')->insert(array (
            0 => 
            array (
                'id' => 1,
                'trabajador_id' => 4,
                'contrato_id' => 1,
                'estado_ot_id' => 2,
                'fecha' => '2022-07-23',
                'descuento' => NULL,
                'motivo_descuento' => NULL,
                'pedido' => 'Lapiz carpintero, escuadra y un nivel nuevo',
                'created_at' => '2022-07-23 01:58:13',
                'updated_at' => '2022-07-23 02:03:05',
            ),
        ));
        
        
    }
}