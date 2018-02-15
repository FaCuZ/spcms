<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('news', function(Blueprint $table) 
		{
            $table->increments('id');
            
            $table->string('title');
            $table->text('body');
            $table->boolean('important')->default(false);

			$table->integer('news_category_id')->unsigned();
			$table->foreign('news_category_id')->references('id')->on('news_categories')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('news');
	}

}
