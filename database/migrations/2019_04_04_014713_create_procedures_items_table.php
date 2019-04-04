<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProceduresItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('procedures_items', function(Blueprint $table)
		{
			$table->integer('items_id')->unsigned()->index('fk_items_idx');
			$table->integer('procedures_id')->unsigned();
			$table->primary(['procedures_id','items_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('procedures_items');
	}

}
