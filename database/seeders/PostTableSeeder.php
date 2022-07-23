<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('post')->delete();
        
        \DB::table('post')->insert(array (
            0 => 
            array (
                'id' => 1,
                'trabajador_id' => 2,
                'foto' => 'photos/postPhoto/nld7hg53rv8bxwnqfr7l',
                'descripcion' => 'Buenas noches compañeros, el día de hoy finalizamos con la entrega del ascensor duplex en Miraflores, felicitaciones!!',
                'created_at' => '2022-07-23 02:05:47',
                'updated_at' => '2022-07-23 02:05:47',
            ),
            1 => 
            array (
                'id' => 2,
                'trabajador_id' => 3,
                'foto' => 'photos/postPhoto/c20iivy1ag5ovcmwbxhn',
                'descripcion' => 'Se les invita a una capacitación a todo el personal administrativo sobre trabajo remoto. Saludos.',
                'created_at' => '2022-07-23 02:24:58',
                'updated_at' => '2022-07-23 02:24:58',
            ),
        ));
        
        
    }
}