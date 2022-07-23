<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EstadoGastoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('estado_gasto')->delete();
        
        \DB::table('estado_gasto')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Inmediato',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Mensual',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
        ));
        
        
    }
}