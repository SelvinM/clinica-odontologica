<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 01 Apr 2019 00:54:25 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Brand
 * 
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $items
 *
 * @package App
 */
class Image extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'image' => 'binary',
	];

	protected $fillable = [
		'image','appointment_id',
	];

	public function items()
	{
		return $this->hasMany(\App\Item::class);
	}

	public function scopeSearch($query, $search){
        return $query
            ->where('name','LIKE','%'.$search.'%');
    }
}