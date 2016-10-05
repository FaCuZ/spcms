<?php 

use Illuminate\Database\Seeder;

class FaqCategoryTableSeeder extends Seeder {

    public function run()
    {
        DB::table('faq_categories')->insert([
			'title' => 'General',
		]);
    }

}