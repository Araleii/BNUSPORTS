<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBadmintonStatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('badminton_states', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->date("date");
			$table->boolean('morning');
			$table->boolean('afternoon');
			$table->boolean('evening');
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
		Schema::drop('badminton_states');
	}

}
