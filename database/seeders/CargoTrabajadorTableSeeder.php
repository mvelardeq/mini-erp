<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CargoTrabajadorTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cargo_trabajador')->delete();
        
        \DB::table('cargo_trabajador')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Técnico 1',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Técnico 2',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Técnico 3',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Técnico 4',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Técnico 5',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            5 => 
            array (
                'id' => 6,
                'nombre' => 'Administrador',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            6 => 
            array (
                'id' => 7,
                'nombre' => 'Gerente de Operaciones',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            7 => 
            array (
                'id' => 8,
                'nombre' => 'Gerente General',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
        ));
        
        
    }
}