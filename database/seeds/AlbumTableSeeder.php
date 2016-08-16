<?php

use Illuminate\Database\Seeder;

class AlbumTableSeeder extends Seeder {

	public function run()
	{
		DB::table('albums')->insert([
			'title' => 'diseño',
		]);

		DB::table('albums')->insert([
			'title' => 'galería',
		]);

		DB::table('albums')->insert([
			'title' => 'ocultas',
		]);
	}

}