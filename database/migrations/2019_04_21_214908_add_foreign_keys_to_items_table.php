<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('items', function(Blueprint $table)
		{
			$table->foreign('brand_id', 'fk_items_brands')->references('id')->on('brands')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('item_type_id', 'fk_items_item_types')->references('id')->on('item_types')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('doctor_id', 'fk_items_users')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('items', function(Blueprint $table)
		{
			$table->dropForeign('fk_items_brands');
			$table->dropForeign('fk_items_item_types');
			$table->dropForeign('fk_items_users');
		});
	}

}
