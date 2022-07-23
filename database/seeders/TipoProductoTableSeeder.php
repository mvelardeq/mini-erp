<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TipoProductoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tipo_producto')->delete();
        
        \DB::table('tipo_producto')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Activo común',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Activo particular',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Consumible',
            ),
        ));
        
        
    }
}