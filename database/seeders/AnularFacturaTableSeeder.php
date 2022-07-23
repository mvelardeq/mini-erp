<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AnularFacturaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('anular_factura')->delete();
        
        
        
    }
}