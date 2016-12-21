<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('pages')->insert([
    		'title' => 'Inicio',
    		'path' => '/',
    		'order' => 0,
    		'editable' => false,
    	]);

    }
}
