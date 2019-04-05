<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 24 Mar 2019 03:13:18 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Invoice
 * 
 * @property int $id
 * @property int $user_id
 * @property int $procedure_id
 * @property int $payment_method_id
 * 
 * @property \App\Models\PaymentMethod $payment_method
 * @property \App\Models\Procedure $procedure
 * @property \App\Models\User $user
 *
 * @package App\Models
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
		return $this->belongsTo(\App\Models\PaymentMethod::class);
	}

	public function procedure()
	{
		return $this->belongsTo(\App\Models\Procedure::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}
}
