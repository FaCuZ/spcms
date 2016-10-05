<?php

use Illuminate\Database\Seeder;

class FaqTableSeeder extends Seeder
{
	public function run()
	{

		if (App::environment('local'))
		{
			DB::table('faq')->insert([
				'question' => '¿Esto es una pregunta?',
				'answer' => 'Si, porque esto es una respuesta.',
				'faq_category_id' => 1,
			]);
			
			DB::table('faq')->insert([
				'question' => '¿Como se veria una respuesta larga?',
				'answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus fugit ex commodi itaque laudantium soluta assumenda animi harum sed enim ducimus officiis provident ratione delectus rem dicta, culpa ipsam explicabo?',
				'faq_category_id' => 1,
			]);
			
		}
	}
}
