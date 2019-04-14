<?php

/**
 * Created by Illiminate Model.
 * Date: Mon, 01 Apr 2019 00:54:25 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Appointment
 * 
 * @property int $id
 * @property int $appointer
 * @property int $doctor
 * @property int $patient_id
 * @property \Carbon\Carbon $date
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\User $user
 * @property \App\Models\Patient $patient
 * @property \Illuminate\Database\Eloquent\Collection $procedures
 *
 * @package App\Models
 */
class Appointment extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'appointer' => 'int',
		'doctor' => 'int',
		'patient_id' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'appointer',
		'doctor',
		'patient_id',
		'date',
		'description'
	];
	
	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'doctor');
	}

	public function patient()
	{
		return $this->belongsTo(\App\Models\Patient::class);
	}

	public function procedures()
	{
		return $this->hasMany(\App\Models\Procedure::class);
	}
}
