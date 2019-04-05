<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('brand_id')->unsigned()->index('fk_items_brands1_idx');
			$table->integer('item_type_id')->unsigned()->index('fk_items_item_types1_idx');
			$table->string('name', 45);
			$table->decimal('price', 10, 0);
			$table->decimal('cost', 10, 0);
			$table->integer('quantity');
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('items');
	}

}
