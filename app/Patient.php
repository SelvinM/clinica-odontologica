<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 01 Apr 2019 00:54:25 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Item
 * 
 * @property int $id
 * @property int $brand_id
 * @property int $item_type_id
 * @property string $name
 * @property float $price
 * @property float $cost
 * @property int $quantity
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Brand $brand
 * @property \App\ItemType $item_type
 * @property \Illuminate\Database\Eloquent\Collection $procedures
 *
 * @package App
 */
class Patient extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'insurance_type_id' => 'int',
		'gender_id' => 'int',
		'blood_type_id' => 'float',
		'description' => 'VARCHAR',
		'name' => 'VARCHAR',
		'email' => 'VARCHAR',
		'home_address' => 'VARCHAR',
		'phone' => 'VARCHAR'
	];

	protected $fillable = [
		'insurance_type_id',
		'gender_id',
		'blood_type_id',
		'description',
		'name',
		'email',
		'home_address',
		'phone'
	];

	public function InsuranceType()
	{
		return $this->belongsTo(\App\InsuranceType::class);
	}

	public function BloodType()
	{
		return $this->belongsTo(\App\BloodType::class);
	}

	public function procedures()
	{
		return $this->belongsToMany(\App\Procedure::class, 'procedures_x_items', 'items_id', 'procedures_id');
	}
}
