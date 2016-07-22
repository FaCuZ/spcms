<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	public function run()
	{
		$this->call(AlbumTableSeeder::class);
		$this->call(GalleryTableSeeder::class);
		$this->call(ImageTableSeeder::class);
		$this->call(UsersTableSeeder::class);
		$this->call(TextTableSeeder::class);
	}
}
