<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EstadoOtTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('estado_ot')->delete();
        
        \DB::table('estado_ot')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Pendiente',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Aprobado',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Falta',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
        ));
        
        
    }
}