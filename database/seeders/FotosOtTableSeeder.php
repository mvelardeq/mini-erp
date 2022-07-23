<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FotosOtTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('fotos_ot')->delete();
        
        \DB::table('fotos_ot')->insert(array (
            0 => 
            array (
                'id' => 1,
                'ot_id' => 1,
                'foto' => 'photos/otPhoto/clgbk3eksu1d1mk0dijl',
                'created_at' => '2022-07-23 01:58:15',
                'updated_at' => '2022-07-23 01:58:15',
            ),
            1 => 
            array (
                'id' => 2,
                'ot_id' => 1,
                'foto' => 'photos/otPhoto/j3qrjfxdzmh8wzkenmw2',
                'created_at' => '2022-07-23 01:58:16',
                'updated_at' => '2022-07-23 01:58:16',
            ),
            2 => 
            array (
                'id' => 3,
                'ot_id' => 1,
                'foto' => 'photos/otPhoto/sbxmywaa0bv2lrmtvzts',
                'created_at' => '2022-07-23 01:58:18',
                'updated_at' => '2022-07-23 01:58:18',
            ),
        ));
        
        
    }
}