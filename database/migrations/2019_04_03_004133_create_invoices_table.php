<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvoicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoices', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->integer('user_id')->unsigned()->index('fk_users_invoice_idx');
			$table->integer('procedure_id')->unsigned()->index('fk_invoices_procedures_idx');
			$table->integer('payment_method_id')->unsigned()->index('fk_invoices_payment_methods_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('invoices');
	}

}
