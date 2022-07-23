<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ObraTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('obra')->delete();
        
        \DB::table('obra')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Multifamiliar Cyb',
                'direccion' => '61748 Westport Point',
                'cliente' => 'Twitterlist',
                'created_at' => '2022-07-20 00:14:02',
                'updated_at' => '2022-07-20 00:14:02',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Multifamiliar Martynka',
                'direccion' => '7 Banding Alley',
                'cliente' => 'Babbleset',
                'created_at' => '2022-07-20 00:15:04',
                'updated_at' => '2022-07-20 00:15:04',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Multifamiliar Skeen',
                'direccion' => '738 Farragut Road',
                'cliente' => 'Shufflebeat',
                'created_at' => '2022-07-20 00:15:39',
                'updated_at' => '2022-07-20 00:15:39',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'MF Nast',
                'direccion' => '6746 Kings Pass',
                'cliente' => 'Eare',
                'created_at' => '2022-07-20 00:16:17',
                'updated_at' => '2022-07-20 00:16:17',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'MF Janssen',
                'direccion' => '334 Schurz Circle',
                'cliente' => 'Fivechat',
                'created_at' => '2022-07-20 00:17:00',
                'updated_at' => '2022-07-20 00:17:00',
            ),
        ));
        
        
    }
}