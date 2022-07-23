<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AsientoCuentaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('asiento_cuenta')->delete();
        
        \DB::table('asiento_cuenta')->insert(array (
            0 => 
            array (
                'id' => 1,
                'cuenta_contable_id' => 5,
                'asiento_contable_id' => 1,
                'debe' => 3610.8,
                'haber' => 0.0,
                'created_at' => '2022-07-22 01:20:06',
                'updated_at' => '2022-07-22 01:20:06',
            ),
            1 => 
            array (
                'id' => 2,
                'cuenta_contable_id' => 10,
                'asiento_contable_id' => 1,
                'debe' => 0.0,
                'haber' => 550.8,
                'created_at' => '2022-07-22 01:20:06',
                'updated_at' => '2022-07-22 01:20:06',
            ),
            2 => 
            array (
                'id' => 3,
                'cuenta_contable_id' => 21,
                'asiento_contable_id' => 1,
                'debe' => 0.0,
                'haber' => 3060.0,
                'created_at' => '2022-07-22 01:20:06',
                'updated_at' => '2022-07-22 01:20:06',
            ),
            3 => 
            array (
                'id' => 4,
                'cuenta_contable_id' => 5,
                'asiento_contable_id' => 2,
                'debe' => 7021.0,
                'haber' => 0.0,
                'created_at' => '2022-07-22 01:24:39',
                'updated_at' => '2022-07-22 01:24:39',
            ),
            4 => 
            array (
                'id' => 5,
                'cuenta_contable_id' => 10,
                'asiento_contable_id' => 2,
                'debe' => 0.0,
                'haber' => 1071.0,
                'created_at' => '2022-07-22 01:24:39',
                'updated_at' => '2022-07-22 01:24:39',
            ),
            5 => 
            array (
                'id' => 6,
                'cuenta_contable_id' => 21,
                'asiento_contable_id' => 2,
                'debe' => 0.0,
                'haber' => 5950.0,
                'created_at' => '2022-07-22 01:24:39',
                'updated_at' => '2022-07-22 01:24:39',
            ),
            6 => 
            array (
                'id' => 7,
                'cuenta_contable_id' => 5,
                'asiento_contable_id' => 3,
                'debe' => 2166.48,
                'haber' => 0.0,
                'created_at' => '2022-07-22 01:25:11',
                'updated_at' => '2022-07-22 01:25:11',
            ),
            7 => 
            array (
                'id' => 8,
                'cuenta_contable_id' => 10,
                'asiento_contable_id' => 3,
                'debe' => 0.0,
                'haber' => 330.48,
                'created_at' => '2022-07-22 01:25:11',
                'updated_at' => '2022-07-22 01:25:11',
            ),
            8 => 
            array (
                'id' => 9,
                'cuenta_contable_id' => 21,
                'asiento_contable_id' => 3,
                'debe' => 0.0,
                'haber' => 1836.0,
                'created_at' => '2022-07-22 01:25:11',
                'updated_at' => '2022-07-22 01:25:11',
            ),
            9 => 
            array (
                'id' => 10,
                'cuenta_contable_id' => 1,
                'asiento_contable_id' => 4,
                'debe' => 0.0,
                'haber' => 20.0,
                'created_at' => '2022-07-23 01:12:04',
                'updated_at' => '2022-07-23 01:12:04',
            ),
            10 => 
            array (
                'id' => 11,
                'cuenta_contable_id' => 6,
                'asiento_contable_id' => 4,
                'debe' => 3.05,
                'haber' => 0.0,
                'created_at' => '2022-07-23 01:12:04',
                'updated_at' => '2022-07-23 01:12:04',
            ),
            11 => 
            array (
                'id' => 12,
                'cuenta_contable_id' => 8,
                'asiento_contable_id' => 4,
                'debe' => 16.95,
                'haber' => 0.0,
                'created_at' => '2022-07-23 01:12:04',
                'updated_at' => '2022-07-23 01:12:04',
            ),
            12 => 
            array (
                'id' => 13,
                'cuenta_contable_id' => 1,
                'asiento_contable_id' => 4,
                'debe' => 0.0,
                'haber' => 35.0,
                'created_at' => '2022-07-23 01:12:04',
                'updated_at' => '2022-07-23 01:12:04',
            ),
            13 => 
            array (
                'id' => 14,
                'cuenta_contable_id' => 6,
                'asiento_contable_id' => 4,
                'debe' => 5.34,
                'haber' => 0.0,
                'created_at' => '2022-07-23 01:12:04',
                'updated_at' => '2022-07-23 01:12:04',
            ),
            14 => 
            array (
                'id' => 15,
                'cuenta_contable_id' => 8,
                'asiento_contable_id' => 4,
                'debe' => 29.66,
                'haber' => 0.0,
                'created_at' => '2022-07-23 01:12:04',
                'updated_at' => '2022-07-23 01:12:04',
            ),
            15 => 
            array (
                'id' => 16,
                'cuenta_contable_id' => 1,
                'asiento_contable_id' => 5,
                'debe' => 0.0,
                'haber' => 18.0,
                'created_at' => '2022-07-23 01:21:26',
                'updated_at' => '2022-07-23 01:21:26',
            ),
            16 => 
            array (
                'id' => 17,
                'cuenta_contable_id' => 6,
                'asiento_contable_id' => 5,
                'debe' => 2.75,
                'haber' => 0.0,
                'created_at' => '2022-07-23 01:21:26',
                'updated_at' => '2022-07-23 01:21:26',
            ),
            17 => 
            array (
                'id' => 18,
                'cuenta_contable_id' => 8,
                'asiento_contable_id' => 5,
                'debe' => 15.25,
                'haber' => 0.0,
                'created_at' => '2022-07-23 01:21:26',
                'updated_at' => '2022-07-23 01:21:26',
            ),
            18 => 
            array (
                'id' => 19,
                'cuenta_contable_id' => 1,
                'asiento_contable_id' => 5,
                'debe' => 0.0,
                'haber' => 850.0,
                'created_at' => '2022-07-23 01:21:26',
                'updated_at' => '2022-07-23 01:21:26',
            ),
            19 => 
            array (
                'id' => 20,
                'cuenta_contable_id' => 6,
                'asiento_contable_id' => 5,
                'debe' => 129.66,
                'haber' => 0.0,
                'created_at' => '2022-07-23 01:21:26',
                'updated_at' => '2022-07-23 01:21:26',
            ),
            20 => 
            array (
                'id' => 21,
                'cuenta_contable_id' => 8,
                'asiento_contable_id' => 5,
                'debe' => 720.34,
                'haber' => 0.0,
                'created_at' => '2022-07-23 01:21:26',
                'updated_at' => '2022-07-23 01:21:26',
            ),
        ));
        
        
    }
}