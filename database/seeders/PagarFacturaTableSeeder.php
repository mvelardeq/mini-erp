<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PagarFacturaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pagar_factura')->delete();
        
        
        
    }
}