<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EquipoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('equipo')->delete();
        
        \DB::table('equipo')->insert(array (
            0 => 
            array (
                'id' => 1,
                'obra_id' => 5,
                'empresa_id' => 2,
                'oe' => '15483564',
                'velocidad' => '1',
                'paradas' => '9',
                'carga' => '900',
                'marca' => 'Otis',
                'modelo' => 'MLR45',
                'accesos' => '9',
                'cuarto_maquina' => 'No',
                'numero_equipo' => '1',
                'plano' => NULL,
                'created_at' => '2022-07-20 00:25:59',
                'updated_at' => '2022-07-20 00:25:59',
            ),
            1 => 
            array (
                'id' => 2,
                'obra_id' => 5,
                'empresa_id' => 2,
                'oe' => '15632487',
                'velocidad' => '1',
                'paradas' => '8',
                'carga' => '600',
                'marca' => 'Otis',
                'modelo' => 'MJT34',
                'accesos' => '14',
                'cuarto_maquina' => 'No',
                'numero_equipo' => '2',
                'plano' => NULL,
                'created_at' => '2022-07-20 00:27:44',
                'updated_at' => '2022-07-20 00:27:44',
            ),
            2 => 
            array (
                'id' => 3,
                'obra_id' => 4,
                'empresa_id' => 3,
                'oe' => '247548',
                'velocidad' => '1.5',
                'paradas' => '10',
                'carga' => '1500',
                'marca' => 'Schindler',
                'modelo' => 'KJ65T',
                'accesos' => '10',
                'cuarto_maquina' => 'No',
                'numero_equipo' => '1',
                'plano' => NULL,
                'created_at' => '2022-07-20 00:29:12',
                'updated_at' => '2022-07-20 00:29:12',
            ),
        ));
        
        
    }
}