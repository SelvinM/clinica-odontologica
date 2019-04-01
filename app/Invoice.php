<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 01 Apr 2019 00:54:25 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Invoice
 * 
 * @property int $id
 * @property int $user_id
 * @property int $procedure_id
 * @property int $payment_method_id
 * 
 * @property \App\PaymentMethod $payment_method
 * @property \App\Procedure $procedure
 * @property \App\User $user
 *
 * @package App
 */
class Invoice extends Eloquent
{
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'user_id' => 'int',
		'procedure_id' => 'int',
		'payment_method_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'procedure_id',
		'payment_method_id'
	];

	public function payment_method()
	{
		return $this->belongsTo(\App\PaymentMethod::class);
	}

	public function procedure()
	{
		return $this->belongsTo(\App\Procedure::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class);
	}
}
