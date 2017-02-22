<?php 

use Illuminate\Database\Seeder;

class TextTableSeeder extends Seeder {

	public function run()
	{

		DB::table('texts')->insert([
			'title' => 'mantenimiento',
			'body' => 'En mantenimiento, vuelva mas tarde.',
			'text_category_id' => 1,
		]);

		DB::table('texts')->insert([
			'title' => 'titulo',
			'body' => 'Single Page CMS',
			'text_category_id' => 1,
		]);

		if (App::environment('local'))
		{
			DB::table('texts')->insert([
				'title' => 'corto',
				'body' => 'Ejemplo de texto.',
				'text_category_id' => 1,
			]);
			
			DB::table('texts')->insert([
				'title' => 'largo',
				'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus fugit ex commodi itaque laudantium soluta assumenda animi harum sed enim ducimus officiis provident ratione delectus rem dicta, culpa ipsam explicabo?',
				'text_category_id' => 1,
			]);
			
			DB::table('texts')->insert([
				'title' => 'muy largo',
				'body' => '<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, tempore debitis! Magnam molestias ipsum, quibusdam, incidunt, atque quasi nihil delectus dolorum a quisquam id reiciendis temporibus architecto omnis, ipsa. Itaque.</div>
				<div>Ipsum repellendus eos vero commodi sint, consequatur temporibus ut dicta delectus officiis laboriosam repudiandae, beatae magni quaerat, placeat perspiciatis dolore rem soluta cum similique corporis reprehenderit tempore porro deleniti. Praesentium.</div>
				<div>Deserunt dolore perferendis, eius quasi, quae nobis esse, ratione id, vero quia nemo aliquid eos sapiente neque ad? Eum deleniti officiis illo nesciunt doloremque consectetur officia voluptate aspernatur nemo temporibus.</div>
				<div>Dolore, recusandae veritatis nisi facilis labore, culpa dolorem asperiores adipisci ea enim, dicta ex non eos modi voluptate facere repudiandae, neque. Quidem temporibus ut vitae accusamus unde. Vero, modi, amet.</div>
				<div>Laborum totam, vitae, eos est quia deleniti provident facilis unde assumenda cum ratione harum ut saepe voluptatibus. Rem consequuntur libero officiis ea quam inventore, nobis quidem, eos porro quaerat, aliquam!</div>',
				'text_category_id' => 1,
			]);
			
		}


	}

}