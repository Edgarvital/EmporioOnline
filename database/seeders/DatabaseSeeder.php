<?php

namespace Database\Seeders;

use App\Models\Categoria;
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
        $this->call(AdministradorSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(ProdutoSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(DenunciaSeeder::class);
    }
}
