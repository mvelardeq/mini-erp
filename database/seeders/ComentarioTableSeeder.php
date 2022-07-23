<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ComentarioTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('comentario')->delete();
        
        \DB::table('comentario')->insert(array (
            0 => 
            array (
                'id' => 1,
                'trabajador_id' => 1,
                'post_id' => 1,
                'contenido' => 'Excelente trabajo Tasha!',
                'created_at' => '2022-07-23 02:15:59',
                'updated_at' => '2022-07-23 02:15:59',
            ),
            1 => 
            array (
                'id' => 2,
                'trabajador_id' => 4,
                'post_id' => 1,
            'contenido' => 'Fue muy buen trabajo, y se logró en el plazo :)',
            'created_at' => '2022-07-23 02:18:50',
            'updated_at' => '2022-07-23 02:18:50',
        ),
        2 => 
        array (
            'id' => 3,
            'trabajador_id' => 1,
            'post_id' => 2,
            'contenido' => 'Muy buena comunicación Amelia, esperamos a todo el personal involucardo para la capacitación.',
            'created_at' => '2022-07-23 08:34:42',
            'updated_at' => '2022-07-23 08:34:42',
        ),
    ));
        
        
    }
}