<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TrabajadorRolTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('trabajador_rol')->delete();
        
        \DB::table('trabajador_rol')->insert(array (
            0 => 
            array (
                'rol_id' => 1,
                'trabajador_id' => 1,
            ),
            1 => 
            array (
                'rol_id' => 3,
                'trabajador_id' => 2,
            ),
            2 => 
            array (
                'rol_id' => 4,
                'trabajador_id' => 3,
            ),
            3 => 
            array (
                'rol_id' => 2,
                'trabajador_id' => 4,
            ),
        ));
        
        
    }
}