<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('applications', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('studentid');//学号
			$table->string('phone');//联系电话
			$table->string('email');//联系邮箱
			$table->string('type');//类型，这里只有足球和篮球
			$table->date("date");//预定的日期
			$table->datetime('apptime');//申请的时间
			$table->integer("enable");//1表示待审核，0表示撤销了,2表示通过
			$table->text('notes');//备注
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
		Schema::drop('applications');
	}

}
