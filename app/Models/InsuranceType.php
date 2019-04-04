<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 24 Mar 2019 03:13:18 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class InsuranceType
 * 
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $patients
 *
 * @package App\Models
 */
class InsuranceType extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	public $incrementing = false;

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
