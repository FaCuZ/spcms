<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaqTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faq', function(Blueprint $table)
        {
            $table->increments('id');

			$table->string('question');
			$table->text('answer');

            $table->integer('faq_category_id')->unsigned();
            $table->foreign('faq_category_id')->references('id')->on('faq_categories')->onDelete('cascade');

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
        Schema::dropIfExists('faq');
    }

}
