<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	public function run()
	{
		$this->call(UsersTableSeeder::class);

		$this->call(AlbumTableSeeder::class);
		$this->call(GalleryTableSeeder::class);
		$this->call(ImageTableSeeder::class);
		
		$this->call(TextCategoryTableSeeder::class);		
		$this->call(TextTableSeeder::class);
	}
}
