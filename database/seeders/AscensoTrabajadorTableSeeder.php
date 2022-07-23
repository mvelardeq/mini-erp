<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AscensoTrabajadorTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ascenso_trabajador')->delete();
        
        \DB::table('ascenso_trabajador')->insert(array (
            0 => 
            array (
                'id' => 1,
                'trabajador_id' => 1,
                'cargo_trabajador_id' => 8,
                'sueldo' => 2000.0,
                'fecha' => '2007-03-01',
                'observacion' => NULL,
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            1 => 
            array (
                'id' => 2,
                'trabajador_id' => 2,
                'cargo_trabajador_id' => 2,
                'sueldo' => 1800.0,
                'fecha' => '2022-07-05',
                'observacion' => NULL,
                'created_at' => '2022-07-22 01:26:56',
                'updated_at' => '2022-07-22 01:26:56',
            ),
            2 => 
            array (
                'id' => 3,
                'trabajador_id' => 3,
                'cargo_trabajador_id' => 6,
                'sueldo' => 5600.0,
                'fecha' => '2022-07-10',
                'observacion' => NULL,
                'created_at' => '2022-07-22 01:28:21',
                'updated_at' => '2022-07-22 01:28:21',
            ),
            3 => 
            array (
                'id' => 4,
                'trabajador_id' => 4,
                'cargo_trabajador_id' => 3,
                'sueldo' => 2000.0,
                'fecha' => '2022-07-18',
                'observacion' => NULL,
                'created_at' => '2022-07-22 01:31:58',
                'updated_at' => '2022-07-22 01:31:58',
            ),
        ));
        
        
    }
}