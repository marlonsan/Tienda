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
         $this->call(EstadoSeeder::class);
         $this->call(CategoriaSeeder::class);
         $this->call(RolSeeder::class);
         $this->call(GeneralidadesSeeder::class);
         $this->call(UserSeeder::class);
    }
}
