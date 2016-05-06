<?php
use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(

        	[
				'name' 		=> 'Usuario', 
				'last_name' => 'Sin Registro', 
				'email' 	=> 'usuario@correo.com', 
				'user' 		=> 'usuario',
				'password' 	=> \Hash::make('123456'),
				'type' 		=> 'user',
				'active' 	=> 1,
				'address' 	=> 'Sin domicilio',
				'created_at'=> new DateTime,
				'updated_at'=> new DateTime
			],
			[
				'name' 		=> 'Luis', 
				'last_name' => 'Bahena', 
				'email' 	=> 'luis.bahena.lopez@gmail.com', 
				'user' 		=> 'Luis',
				'password' 	=> \Hash::make('Olmeii5202'),
				'type' 		=> 'admin',
				'active' 	=> 1,
				'address' 	=> 'Paraguay 93, Xochitepec Morelos, col Centro',
				'created_at'=> new DateTime,
				'updated_at'=> new DateTime
			],
			
		);
		User::insert($data);
    }
}