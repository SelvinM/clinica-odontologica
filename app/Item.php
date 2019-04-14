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
		'quantity' => 'int',
		'batch' => 'int'
	];

	protected $dates = [
		'purchase_date',
		'expiration_date'
	];

	protected $fillable = [
		'brand_id',
		'item_type_id',
		'name',
		'price',
		'cost',
		'quantity',
		'batch',
		'purchase_date',
		'expiration_date',
		'description'
	];

	public function brand()
	{
		return $this->belongsTo(\App\Models\Brand::class);
	}

	public function item_type()
	{
		return $this->belongsTo(\App\Models\ItemType::class);
	}

	public function procedures()
	{
		return $this->belongsToMany(\App\Models\Procedure::class, 'procedures_items', 'items_id', 'procedures_id');
	}
}
