<?php namespace Modules\Texts\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TextsDatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call(TextCategoryTableSeeder::class);		
		$this->call(TextTableSeeder::class);
	}
}
