<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class AlbumTableSeeder extends Seeder {

    public function run()
    {
		DB::table('albums')->insert([
			'title' => 'Diseño',
		]);
    }

}