<?php

use Illuminate\Database\Seeder;

class GeneralidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('estado_civil')->insert([
			                            ['Nombre' => 'Casado(a)',],
			                            ['Nombre' => 'Soltero(a)',],
			                            ['Nombre' => 'Divorsiado(a)',]                           
		                            ]);

         DB::table('genero')->insert([
			                            ['Nombre' => 'Masculino',],
			                            ['Nombre' => 'Femenino',]       
		                            ]);

        DB::table('operadora')->insert([
			                            ['RazonSocial'     => 'America Movil Peru S.A.C.',
			                             'NombreComercial' => 'Claro',
			                             'RUC'             => '20467534026'],
			                            ['RazonSocial'     => 'Telefonica del Peru S.A.A.',
			                             'NombreComercial' => 'Telefonica',
			                             'RUC'             => '20100017491']       
		                            ]);

        DB::table('departamento')->insert([
			                                  ['Nombre' => 'Tumbes',],
			                                  ['Nombre' => 'Piura',],
			                                  ['Nombre' => 'Lambayeque',],
			                                  ['Nombre' => 'La Libertad',],
		                                  ]);
		DB::table('provincia')->insert([
			                               ['Nombre'         => 'Trujillo',
			                                'DepartamentoID' => 4],
		                               ]);
		
		DB::table('distrito')->insert([
			                              ['Nombre'         => 'Trujillo',
			                               'ProvinciaID'    => 1,
			                               'DepartamentoID' => 4],
		                              ]);

		DB::table('direccion')->insert([
			                            ['Nombre'         => 'Plazuela El Recreo #1310',
			                             'DistritoID'     => 1,
			                             'ProvinciaID'    => 1,
			                             'DepartamentoID' => 4],
		                            ]);
    
    }
}
