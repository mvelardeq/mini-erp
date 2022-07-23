<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PeriodoTrabajadorTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('periodo_trabajador')->delete();
        
        \DB::table('periodo_trabajador')->insert(array (
            0 => 
            array (
                'id' => 1,
                'trabajador_id' => 1,
                'fecha_inicio' => '2007-03-01',
                'fecha_fin' => NULL,
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            1 => 
            array (
                'id' => 2,
                'trabajador_id' => 2,
                'fecha_inicio' => '2022-07-05',
                'fecha_fin' => NULL,
                'created_at' => '2022-07-22 01:26:56',
                'updated_at' => '2022-07-22 01:26:56',
            ),
            2 => 
            array (
                'id' => 3,
                'trabajador_id' => 3,
                'fecha_inicio' => '2022-07-10',
                'fecha_fin' => NULL,
                'created_at' => '2022-07-22 01:28:21',
                'updated_at' => '2022-07-22 01:28:21',
            ),
            3 => 
            array (
                'id' => 4,
                'trabajador_id' => 4,
                'fecha_inicio' => '2022-07-18',
                'fecha_fin' => NULL,
                'created_at' => '2022-07-22 01:31:58',
                'updated_at' => '2022-07-22 01:31:58',
            ),
        ));
        
        
    }
}