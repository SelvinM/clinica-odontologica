<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppointmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('appointments', function(Blueprint $table)
		{
			$table->integer('id')->unsigned()->primary();
			$table->integer('appointer')->unsigned()->index('fk_appointments_appointer_idx');
			$table->integer('doctor')->unsigned()->index('fk_appointments_doctor_idx');
			$table->integer('patient_id')->unsigned()->index('fk_appointments_patients_idx');
			$table->dateTime('date');
			$table->string('description', 8000)->nullable();
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
		Schema::drop('appointments');
	}

}
