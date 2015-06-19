<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePingpangsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pingpangs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->date("date");
			$table->integer('six2seven');
			$table->integer('seven2eight');
			$table->integer('eight2nine');
			$table->timestamps();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pingpangs');
	}

}
