<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('images', function(Blueprint $table) {
            $table->increments('id');
            
            $table->string('title');
            $table->string('file');  
            $table->string('thumb');  
            $table->text('description')->nullable();

			$table->integer('gallery_id')->unsigned();
			$table->foreign('gallery_id')->references('id')->on('galleries')->onDelete('cascade');

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
		Schema::dropIfExists('images');
	}

}
