<?php


namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Person extends Eloquent
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
