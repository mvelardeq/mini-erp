<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTablas([
            'rol',
            'permiso',
            'trabajador',
            'trabajador_rol'
        ]);
        $this->call(TrabajadorTableSeeder::class);
        $this->call(RolTableSeeder::class);
        $this->call(PermisoTableSeeder::class);
        $this->call(TrabajadorRolTableSeeder::class);
        $this->call(PermisoRolTableSeeder::class);
        $this->call(MenuTableSeeder::class);
        $this->call(MenuRolTableSeeder::class);
        $this->call(ObsTrabajadorTableSeeder::class);
        $this->call(PeriodoTrabajadorTableSeeder::class);
        $this->call(CargoTrabajadorTableSeeder::class);
        $this->call(EstadoOtTableSeeder::class);
        $this->call(EmpresaTableSeeder::class);
        $this->call(BoletaPagoTableSeeder::class);
        $this->call(ServicioTableSeeder::class);
        $this->call(EstadoFacturaTableSeeder::class);
        $this->call(ObraTableSeeder::class);
        $this->call(AscensoTrabajadorTableSeeder::class);
        $this->call(EquipoTableSeeder::class);
        $this->call(ActividadTableSeeder::class);
        $this->call(ContratoTableSeeder::class);
        $this->call(OtTableSeeder::class);
        $this->call(CotizacionTableSeeder::class);
        $this->call(EstadoConceptoPagoSeeder::class);
        $this->call(ConceptoPagoTableSeeder::class);
        $this->call(LineaCotizacionTableSeeder::class);
        $this->call(FacturaTableSeeder::class);
        $this->call(OtActividadTableSeeder::class);
        $this->call(PagarFacturaTableSeeder::class);
        $this->call(DetraerFacturaTableSeeder::class);
        $this->call(AnularFacturaTableSeeder::class);
        $this->call(QuincenaTableSeeder::class);
        $this->call(AdelantoTrabajadorTableSeeder::class);
        $this->call(TipoGastoTableSeeder::class);
        $this->call(EstadoGastoTableSeeder::class);
        $this->call(GastoTrabajadorTableSeeder::class);
        $this->call(TipoProductoTableSeeder::class);
        $this->call(CategoriaProductoTableSeeder::class);
        $this->call(ProductoTableSeeder::class);
        $this->call(CompraTableSeeder::class);
        $this->call(ItemCompraTableSeeder::class);
        $this->call(PerdidaExistenciaTableSeeder::class);
        $this->call(ServicioTerceroTableSeeder::class);
        $this->call(PagoServicioTableSeeder::class);
        $this->call(CuentaContableTableSeeder::class);
        $this->call(AsientoContableTableSeeder::class);
        $this->call(AsientoCuentaTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(ComentarioTableSeeder::class);
        $this->call(LikesTableSeeder::class);
        $this->call(TransferenciaTableSeeder::class);
        $this->call(FotosOtTableSeeder::class);
    }
    protected function truncateTablas(array $tablas)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach ($tablas as $tabla) {
            DB::table($tabla)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS =1;');
    }
}
