<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePatientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('patients', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('insurance_type_id')->unsigned()->index('fk_patients_insurance_types_idx');
			$table->integer('gender_id')->index('fk_patients_genders_idx');
			$table->integer('blood_type_id')->unsigned()->index('fk_patients_blood_types_idx');
			$table->string('description', 8000);
			$table->string('name', 45);
			$table->string('email', 45);
			$table->string('home_address', 45);
			$table->dateTime('birthdate');
			$table->string('phone', 45)->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->integer('doctor_id')->unsigned()->index('fk_patients_users_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('patients');
	}

}
