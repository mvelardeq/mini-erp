<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PerdidaExistenciaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('perdida_existencia')->delete();
        
        
        
    }
}