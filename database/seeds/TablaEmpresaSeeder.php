<?php

// namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaEmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empresa')->insert([
            'razon_social' => 'TK ELEVADORES PERU S.A.C - TK ELEVADORES PERÚ',
            'ruc' => '20295734681',
            'pago_hora' => 34,
            'direccion' => 'Av. Paseo de la República 1479 Urb. Balconcillo por la empresa luz del sur Lima-Lima-La Victoria',
            'actividad' => 'Servicios de elevación',
            'porcentaje_detraccion' => 12,
            'observacion' => 'Ninguna',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
