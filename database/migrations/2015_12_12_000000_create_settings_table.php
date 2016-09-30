<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration {
  
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('settings', function(Blueprint $table) {
            $table->increments('id');

            $table->string('key')->index();
            $table->text('value');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('settings');
    }

}
