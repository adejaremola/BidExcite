<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bids', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->default(0);
			$table->integer('item_id')->unsigned()->default(0);
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
			$table->integer('price');
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
		Schema::drop('bids');
	}

}
