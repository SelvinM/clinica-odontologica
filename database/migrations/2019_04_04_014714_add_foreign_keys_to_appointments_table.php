<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAppointmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('appointments', function(Blueprint $table)
		{
			$table->foreign('appointer', 'fk_appointments_appointer')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('doctor', 'fk_appointments_doctor')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('invoice_id', 'fk_appointments_invoices')->references('id')->on('invoices')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('patient_id', 'fk_appointments_patients')->references('id')->on('patients')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('appointments', function(Blueprint $table)
		{
			$table->dropForeign('fk_appointments_appointer');
			$table->dropForeign('fk_appointments_doctor');
			$table->dropForeign('fk_appointments_invoices');
			$table->dropForeign('fk_appointments_patients');
		});
	}

}
