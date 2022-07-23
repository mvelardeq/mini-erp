<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PagoServicioTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pago_servicio')->delete();
        
        
        
    }
}