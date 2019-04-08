<?php

/**
 * Created by Illuminate Model.
 * Date: Mon, 01 Apr 2019 00:54:25 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Gender
 * 
 * @property int $id
 * @property string $name
 * 
 * @property \Illuminate\Database\Eloquent\Collection $patients
 *
 * @package App
 */
class Gender extends Eloquent
{
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'name'
	];

	public function patients()
	{
		return $this->hasMany(\App\Patient::class);
	}
}
