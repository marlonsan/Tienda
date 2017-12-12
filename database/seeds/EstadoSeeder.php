<?php

use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articulo_estado')->insert([
			                            ['Nombre' => 'Agotado',],
			                            ['Nombre' => 'En Stock',]			                           
		                            ]);
		DB::table('venta_estado')->insert([
			                          ['Nombre' => 'Creado',],
			                          ['Nombre' => 'Pendiente',],
			                          ['Nombre' => 'Pagada',]	
		                         ]);
    }
}
