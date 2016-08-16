<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class ImageTableSeeder extends Seeder {

	public function run()
	{
		DB::table('images')->insert([
			'title' => 'logo',
			'description' => 'Logo de la empresa.',
			'file' => 'images/logo.jpg',
			'thumb' => 'images/logo-thumb.jpg',
			'gallery_id' => 1,
		]);

		DB::table('images')->insert([
			'title' => 'sin imagen',
			'description' => 'Imagen que muestra al no encontrar una imagen.',
			'file' => 'images/sin-imagen.jpg',
			'thumb' => 'images/sin-imagen-thumb.jpg',
			'gallery_id' => 3,
		]);
	}

}