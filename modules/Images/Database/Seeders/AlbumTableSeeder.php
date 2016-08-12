<?php

use Illuminate\Database\Seeder;

class AlbumTableSeeder extends Seeder {

	public function run()
	{
		DB::table('albums')->insert([
			'title' => 'Diseño',
		]);

		DB::table('albums')->insert([
			'title' => 'Galería',
		]);

		DB::table('albums')->insert([
			'title' => 'Ocultas',
		]);
	}

}