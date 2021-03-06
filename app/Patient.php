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
		'gender_id' => 'int',
		'blood_type_id' => 'float',
		'description' => 'VARCHAR',
		'name' => 'VARCHAR',
		'email' => 'VARCHAR',
		'home_address' => 'VARCHAR',
		'birthdate' => 'DATE',
		'phone' => 'VARCHAR',
		'doctor_id' => 'int'
	];

	protected $fillable = [
		'gender_id',
		'blood_type_id',
		'description',
		'name',
		'email',
		'home_address',
		'birthdate',
		'phone',
		'doctor_id'
	];


	public function scopeSearch($query, $search){ 
        return $query
            ->where('name','like','%'.$search.'%')
            ->orWhere('home_address','like','%'.$search.'%')
            ->orWhere('email','like','%'.$search.'%')
            ->orwhere('phone', 'like', '%'.$search.'%');
    }
	
	
	public function blood_type()
	{
		return $this->belongsTo(\App\BloodType::class);
	}

	public function gender()
	{
		return $this->belongsTo(\App\Gender::class);
	}

	public function procedures()
	{
		return $this->belongsToMany(\App\Procedure::class, 'procedures_x_items', 'items_id', 'procedures_id');
	}
}
