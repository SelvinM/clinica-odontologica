<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProceduresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('procedures', function(Blueprint $table)
		{
			$table->foreign('appointment_id', 'fk_procedures_appointments1')->references('id')->on('appointments')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('procedure_type_id', 'fk_procedures_procedure_types1')->references('id')->on('procedure_types')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('procedures', function(Blueprint $table)
		{
			$table->dropForeign('fk_procedures_appointments1');
			$table->dropForeign('fk_procedures_procedure_types1');
		});
	}

}
