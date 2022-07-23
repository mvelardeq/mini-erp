<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriaProductoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categoria_producto')->delete();
        
        \DB::table('categoria_producto')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Herramienta',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Equipo',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Seguridad',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Material de montaje',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Material de oficina',
            ),
        ));
        
        
    }
}