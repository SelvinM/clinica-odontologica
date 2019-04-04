<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToInvoicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('invoices', function(Blueprint $table)
		{
			$table->foreign('payment_method_id', 'fk_invoices_payment_methods')->references('id')->on('payment_methods')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('procedure_id', 'fk_invoices_procedures')->references('id')->on('procedures')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('user_id', 'fk_invoices_users')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('invoices', function(Blueprint $table)
		{
			$table->dropForeign('fk_invoices_payment_methods');
			$table->dropForeign('fk_invoices_procedures');
			$table->dropForeign('fk_invoices_users');
		});
	}

}
