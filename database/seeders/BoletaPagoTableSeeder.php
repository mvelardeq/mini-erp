<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BoletaPagoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('boleta_pago')->delete();
        
        
        
    }
}