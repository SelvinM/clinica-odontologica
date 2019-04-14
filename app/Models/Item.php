<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 24 Mar 2019 03:13:18 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

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
 * @property \App\Models\Brand $brand
 * @property \App\Models\ItemType $item_type
 *
 * @package App\Models
 */
class Item extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'brand_id' => 'int',
		'item_type_id' => 'int',
		'cost' => 'float',
		'quantity' => 'int',
	];

	protected $fillable = [
		'brand_id',
		'item_type_id',
		'name',
		'cost',
		'quantity',
		'expiration_date',
		'batch',
		'purchase_date',
		'description',
	];

	public function brand()
	{
		return $this->belongsTo(\App\Models\Brand::class);
	}

	public function item_type()
	{
		return $this->belongsTo(\App\Models\ItemType::class);
	}
}
