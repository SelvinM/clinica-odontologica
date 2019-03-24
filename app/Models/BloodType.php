<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 24 Mar 2019 03:13:18 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BloodType
 * 
 * @property int $id
 * @property string $name
 * 
 * @property \Illuminate\Database\Eloquent\Collection $patients
 *
 * @package App\Models
 */
class BloodType extends Eloquent
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
		return $this->hasMany(\App\Models\Patient::class);
	}
}
