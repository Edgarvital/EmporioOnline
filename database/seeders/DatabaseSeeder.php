<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(ProdutoSeeder::class);
        $this->call(DenunciaSeeder::class);
        $this->call(CaracteristicaSeeder::class);
        $this->call(AvaliacaoSeeder::class);
        $this->call(PedidoSeeder::class);
        $this->call(ItemPedidoSeeder::class);
    }
}
