<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OtActividadTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ot_actividad')->delete();
        
        \DB::table('ot_actividad')->insert(array (
            0 => 
            array (
                'id' => 1,
                'ot_id' => 1,
                'actividad_id' => 1,
                'horas' => 5.0,
                'created_at' => '2022-07-23 01:58:13',
                'updated_at' => '2022-07-23 01:58:13',
            ),
            1 => 
            array (
                'id' => 2,
                'ot_id' => 1,
                'actividad_id' => 2,
                'horas' => 3.0,
                'created_at' => '2022-07-23 01:58:13',
                'updated_at' => '2022-07-23 01:58:13',
            ),
        ));
        
        
    }
}