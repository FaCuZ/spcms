<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('galleries', function(Blueprint $table) {
			$table->increments('id');

			$table->string('title')->unique();
			$table->text('description')->nullable();
			
			$table->integer('default_image_id')->unsigned()->nullable();

			$table->integer('album_id')->unsigned();
			$table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');

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
		Schema::dropIfExists('galleries');
	}

}
