<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 这样用type代表运动种类，1~6和图中对应。
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('userid');//用户
			$table->integer('type')->nullable();//1~6对应六种
			$table->string('gymname')->nullable();//羽毛球场馆1这样的
			$table->datetime('paytime');//支付时间
			$table->datetime('bookingtime');//租借时间
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
		Schema::drop('orders');
	}

}
