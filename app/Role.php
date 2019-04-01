<?php 

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Role extends Eloquent
{
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'name'
	];
	
	public function users()
	{
		return $this->hasMany(\App\User::class);
	}
}
