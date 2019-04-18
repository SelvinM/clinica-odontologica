<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProceduresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('procedures', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('procedure_type_id')->unsigned()->index('fk_procedures_procedure_types_idx');
			$table->integer('appointment_id')->unsigned()->index('fk_procedures_appointments_idx');
			$table->decimal('price', 10);
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
		Schema::drop('procedures');
	}

}
