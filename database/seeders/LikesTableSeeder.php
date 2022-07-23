<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('likes')->delete();
        
        \DB::table('likes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'trabajador_id' => 2,
                'post_id' => 1,
                'created_at' => '2022-07-23 02:15:26',
                'updated_at' => '2022-07-23 02:15:26',
            ),
            1 => 
            array (
                'id' => 2,
                'trabajador_id' => 1,
                'post_id' => 1,
                'created_at' => '2022-07-23 02:15:42',
                'updated_at' => '2022-07-23 02:15:42',
            ),
            2 => 
            array (
                'id' => 3,
                'trabajador_id' => 4,
                'post_id' => 1,
                'created_at' => '2022-07-23 02:18:04',
                'updated_at' => '2022-07-23 02:18:04',
            ),
            3 => 
            array (
                'id' => 4,
                'trabajador_id' => 1,
                'post_id' => 2,
                'created_at' => '2022-07-23 08:35:09',
                'updated_at' => '2022-07-23 08:35:09',
            ),
        ));
        
        
    }
}