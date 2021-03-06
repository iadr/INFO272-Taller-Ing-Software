<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(ProveedorSeeder::class);
        $this->call(Prov_ProdSeeder::class);
    }
}
