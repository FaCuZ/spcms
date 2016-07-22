<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class GalleryTableSeeder extends Seeder {

	public function run()
	{
		DB::table('galleries')->insert([
			'title' => 'Logos',
			'album_id' => 1, 
		]);	
		
		DB::table('galleries')->insert([
			'title' => 'Fondos',
			'album_id' => 1, 
		]);

		DB::table('galleries')->insert([
			'title' => 'Error',
			'album_id' => 1, 
		]);
	}

}