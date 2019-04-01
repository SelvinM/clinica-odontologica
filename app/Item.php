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
class Item extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'brand_id' => 'int',
		'item_type_id' => 'int',
		'price' => 'float',
		'cost' => 'float',
		'quantity' => 'int'
	];

	protected $fillable = [
		'brand_id',
		'item_type_id',
		'name',
		'price',
		'cost',
		'quantity'
	];

	public function brand()
	{
		return $this->belongsTo(\App\Brand::class);
	}

	public function item_type()
	{
		return $this->belongsTo(\App\ItemType::class);
	}

	public function procedures()
	{
		return $this->belongsToMany(\App\Procedure::class, 'procedures_x_items', 'items_id', 'procedures_id');
	}
}
