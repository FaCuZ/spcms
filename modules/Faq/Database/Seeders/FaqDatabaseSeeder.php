<?php

use Illuminate\Database\Seeder;

class FaqDatabaseSeeder extends Seeder
{

	public function run()
	{
		if (App::environment('local'))
		{
			DB::table('texts')->insert([
				'question' => '¿Esto es una pregunta?',
				'answer' => 'Si, porque esto es una respuesta.',
				'faq_category_id' => 1,
			]);
			
			DB::table('texts')->insert([
				'question' => '¿Como se veria una respuesta larga?',
				'answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus fugit ex commodi itaque laudantium soluta assumenda animi harum sed enim ducimus officiis provident ratione delectus rem dicta, culpa ipsam explicabo?',
				'faq_category_id' => 1,
			]);
			
		}
	}
}
