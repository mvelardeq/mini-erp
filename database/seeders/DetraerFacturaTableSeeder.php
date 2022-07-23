<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DetraerFacturaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('detraer_factura')->delete();
        
        
        
    }
}