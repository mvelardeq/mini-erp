<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServicioTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('servicio')->delete();
        
        \DB::table('servicio')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Montaje Traccionado',
                'observacion' => 'Montaje de ascensor con el procedimiento traccionado, en el cual se requiere una plataforma; si no se cuenta con ello, se debe instalar por el método tradicional',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Montaje Tradicional',
                'observacion' => 'Montaje tradicional implica instalar el ascensor sin una plataforma en el último nivel, se sube con el maquinillo',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Servicio Adicional',
            'observacion' => 'Se aplica un servicio adicional a un contrato que no pertenece al proceso natural de montaje de ascensor (generalmente se establece mediante una cotización); por ejemplo instalación de vigas y escalera, pintado de pozo y techo, corregir errores de fábrica, servicios específicos o puntuales de reparación de ascensores, etc.',
                'created_at' => '2022-07-19 00:56:35',
                'updated_at' => '2022-07-19 00:56:35',
            ),
        ));
        
        
    }
}