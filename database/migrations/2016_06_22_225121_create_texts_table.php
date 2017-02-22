<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTextsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('texts', function(Blueprint $table) {
            $table->increments('id');
            
            $table->string('title');
            $table->text('body');

			$table->integer('text_category_id')->unsigned();
			$table->foreign('text_category_id')->references('id')->on('text_categories')->onDelete('cascade');

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
		Schema::dropIfExists('texts');
	}

}
