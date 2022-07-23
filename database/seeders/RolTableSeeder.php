<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('rol')->delete();
        
        \DB::table('rol')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'administrador',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'técnico',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'supervisor',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'asistente',
                'created_at' => '2022-07-19 00:56:34',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}