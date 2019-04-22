<?php


namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Procedure extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'procedure_type_id' => 'int',
		'appointment_id' => 'int',
		'price' => 'float',
	];

	protected $dates = [
		
	];

	protected $fillable = [
		'procedure_type_id' => 'int',
		'appointment_id' => 'int',
		'price' => 'float',
	];


	public function scopeSearch($query, $search){
        return $query
            ->whereHas('procedure_type',function($q)use($search){
                $q->where('name','like','%'.$search.'%');
            })
            ->orWhereHas('appointment',function($q)use($search){
                $q->whereHas('patient',function($s)use($search){
                	$s->where('name','like','%'.$search.'%');
                });
            })
            ->orWhereHas('appointment',function($q)use($search){
                $q->where('date','like','%'.$search.'%');
            });
            
    }

	public function procedure_type()
	{
		return $this->belongsTo(\App\ProcedureType::class);
	}

	public function Appointment()
	{
		return $this->belongsTo(\App\Appointment::class);
	}

	
}
