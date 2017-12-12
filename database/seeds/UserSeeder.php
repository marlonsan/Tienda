<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dt = (new DateTime)->format('y-m-d H:i:s');
		DB::table('users')->insert([
			                             ['name' => 'Edir',
			                              'email'=> 'edircito@gmail.com',
			                              'password'=>bcrypt('123'),
				                          'created_at'         => $dt,
				                          'updated_at'         => $dt,
				                      	  'RolID' => 2	],
		                             ]);
    }
}
