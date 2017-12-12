<?php

use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $dt = (new DateTime)->format('y-m-d H:i:s');
		DB::table('categoria')->insert([
			                               ['Imagen'      => 'img/check.png',
			                                'Nombre'      => 'Celulares',
			                                'Descripcion' => 'Celulares',
			                                'created_at'  => $dt,
			                                'updated_at'  => $dt],
			                               ['Imagen'      => 'img/check.png',
			                                'Nombre'      => 'Laptop',
			                                'Descripcion' => 'Laptop',
			                                'created_at'  => $dt,
			                                'updated_at'  => $dt],
			                                ['Imagen'      => 'img/check.png',
			                                'Nombre'      => 'Tablets',
			                                'Descripcion' => 'Tablets',
			                                'created_at'  => $dt,
			                                'updated_at'  => $dt],
			                                ['Imagen'      => 'img/check.png',
			                                'Nombre'      => 'Monitores',
			                                'Descripcion' => 'Monitores',
			                                'created_at'  => $dt,
			                                'updated_at'  => $dt],
			                                ['Imagen'      => 'img/check.png',
			                                'Nombre'      => 'Mouses',
			                                'Descripcion' => 'Mouses',
			                                'created_at'  => $dt,
			                                'updated_at'  => $dt],
			                                ['Imagen'      => 'img/check.png',
			                                'Nombre'      => 'Teclados',
			                                'Descripcion' => 'Teclados',
			                                'created_at'  => $dt,
			                                'updated_at'  => $dt]
		                               ]);
    }
}
