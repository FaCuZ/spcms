<?php 

use Illuminate\Database\Seeder;

class TextCategoryTableSeeder extends Seeder {

    public function run()
    {
        DB::table('text_categories')->insert([
			'title' => 'diseño',
		]);

		DB::table('text_categories')->insert([
			'title' => 'ocultos',
		]);
    }

}