<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notifications', function(Blueprint $table)
		{
			$table->integer('user_id')->unsigned()->default(0);
			$table->integer('bids_id')->unsigned()->default(0);
			$table->increments('id');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('bids_id')->references('id')->on('bids')->onDelete('cascade');
			$table->binary('content');
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
		Schema::drop('notifications');
	}

}
