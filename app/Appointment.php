<?php

/**
 * Created by Illiminate Model.
 * Date: Mon, 01 Apr 2019 00:54:25 +0000.
 */

namespace App;

use Auth;
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

	public static function Appointments(){
		if (Auth::user()->role_id==2) {
			$appointments = Appointment::all()->where('doctor',Auth::id());
		}else{
			$appointments = Appointment::all()->where('appointer',Auth::id());
		}
            
            #$json_arr=array($appointments);
            foreach ($appointments as $appointment) {
                $json_arr[]=array("id"=>$appointment->id,"title"=>$appointment->patient->name,"description"=>$appointment->description,"start"=>"".$appointment->date."","editable"=>false);
            } 

            file_get_contents(public_path('/fullcalendar/demos/json/events.json'));
            file_put_contents(public_path('/fullcalendar/demos/json/events.json'), json_encode($json_arr));
	}
	
	public function user()
	{
		return $this->belongsTo(\App\User::class, 'doctor');
	}

	public function patient()
	{
		return $this->belongsTo(\App\Patient::class);
	}

	public function procedures()
	{
		return $this->hasMany(\App\Procedure::class);
	}
}
