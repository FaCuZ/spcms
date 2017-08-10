<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->insert([
			'name' => 'Admin Name',
			'email' => 'admin@test.com',
			'password' => bcrypt('admin'),
			'role' => "admin"
		]);

		DB::table('users')->insert([
			'name' => 'Client Name',
			'email' => 'client@test.com',
			'password' => bcrypt('client'),
			'role' => "client"
		]);
	}
}
