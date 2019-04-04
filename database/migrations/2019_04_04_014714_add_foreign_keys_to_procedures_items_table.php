<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProceduresItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('procedures_items', function(Blueprint $table)
		{
			$table->foreign('items_id', 'fk_items')->references('id')->on('items')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('procedures_id', 'fk_procedures')->references('id')->on('procedures')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('procedures_items', function(Blueprint $table)
		{
			$table->dropForeign('fk_items');
			$table->dropForeign('fk_procedures');
		});
	}

}
