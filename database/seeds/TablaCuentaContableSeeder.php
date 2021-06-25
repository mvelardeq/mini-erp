<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaCuentaContableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cuenta_contable')->insert([
            'codigo' => '1021',
            'nombre' => 'Fondos fijos Martín Velarde',
            'saldo' => 0,
            'banco' => 'Bbva Continental',
            'numero_cuenta' => '0011-0113-0200605440',
            'responsable_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('cuenta_contable')->insert([
            'codigo' => '1022',
            'nombre' => 'Fondos fijos Sayuri Velarde',
            'saldo' => 0,
            'banco' => 'Bbva Continental',
            'numero_cuenta' => '0011-0284-0200510017',
            'responsable_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('cuenta_contable')->insert([
            'codigo' => '10411',
            'nombre' => 'Cuenta corriente general',
            'saldo' => 0,
            'banco' => 'Bbva Continental',
            'numero_cuenta' => '0011-0174-000100010442',
            'responsable_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('cuenta_contable')->insert([
            'codigo' => '1042',
            'nombre' => 'Cuenta corriente para fines específicos',
            'saldo' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('cuenta_contable')->insert([
            'codigo' => '1212',
            'nombre' => 'Facturas emitidas en cartera',
            'saldo' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('cuenta_contable')->insert([
            'codigo' => '1673',
            'nombre' => 'Igv por acreditar en compras',
            'saldo' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('cuenta_contable')->insert([
            'codigo' => '3346',
            'nombre' => 'Equipos diversos',
            'saldo' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('cuenta_contable')->insert([
            'codigo' => '3371',
            'nombre' => 'Herramientas',
            'saldo' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('cuenta_contable')->insert([
            'codigo' => '3647',
            'nombre' => 'Herramientas y unidades de reemplazo',
            'saldo' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('cuenta_contable')->insert([
            'codigo' => '40111',
            'nombre' => 'IGV-Cuenta propia',
            'saldo' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('cuenta_contable')->insert([
            'codigo' => '6032',
            'nombre' => 'Suministros',
            'saldo' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('cuenta_contable')->insert([
            'codigo' => '6211',
            'nombre' => 'Sueldos y salarios',
            'saldo' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('cuenta_contable')->insert([
            'codigo' => '622',
            'nombre' => 'Otras remuneraciones',
            'saldo' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('cuenta_contable')->insert([
            'codigo' => '6273',
            'nombre' => 'Seguro complementario de trabajo de riesgo, accidentes de trabajo y enfermedades profesionales',
            'saldo' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('cuenta_contable')->insert([
            'codigo' => '6343',
            'nombre' => 'Mantenimiento propiedad, planta y equipo',
            'saldo' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('cuenta_contable')->insert([
            'codigo' => '6361',
            'nombre' => 'Energía eléctrica',
            'saldo' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('cuenta_contable')->insert([
            'codigo' => '6362',
            'nombre' => 'Gas',
            'saldo' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('cuenta_contable')->insert([
            'codigo' => '6363',
            'nombre' => 'Agua',
            'saldo' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('cuenta_contable')->insert([
            'codigo' => '6364',
            'nombre' => 'Teléfono',
            'saldo' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('cuenta_contable')->insert([
            'codigo' => '6392',
            'nombre' => 'Gastos de laboratorio EMO',
            'saldo' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('cuenta_contable')->insert([
            'codigo' => '70321',
            'nombre' => 'Ingresos servicios tercero',
            'saldo' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('cuenta_contable')->insert([
            'codigo' => '79',
            'nombre' => 'Cargas imputables a cuentas de costos y gastos',
            'saldo' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('cuenta_contable')->insert([
            'codigo' => '92',
            'nombre' => 'Gastos de producción',
            'saldo' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('cuenta_contable')->insert([
            'codigo' => '94',
            'nombre' => 'Gastos administrativos',
            'saldo' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('cuenta_contable')->insert([
            'codigo' => '95',
            'nombre' => 'Gastos de ventas',
            'saldo' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
