<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class GalleryTableSeeder extends Seeder {

	public function run()
	{
		DB::table('galleries')->insert([
			'title' => 'logos',
			'album_id' => 1, 
		]);	
		
		DB::table('galleries')->insert([
			'title' => 'fondos',
			'album_id' => 1, 
		]);

		DB::table('galleries')->insert([
			'title' => 'error',
			'album_id' => 1, 
		]);
	}

}