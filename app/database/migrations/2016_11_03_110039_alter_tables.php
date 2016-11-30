<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::rename('items', 'deals');
		Schema::table('deals', function($table)
		{
			$table->string('title');
			$table->text('description');
			$table->decimal('price');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropColumn('title', 'description', 'price');
		Schema::rename('deals', 'items');

	}

}
