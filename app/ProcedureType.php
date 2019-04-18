<?php



namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ProcedureType extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	public $incrementing = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'name',
	];

	public function procedures()
	{
		return $this->hasMany(\App\Procedure::class);
	}

	public function scopeSearch($query, $search){
        return $query
            ->where('name','LIKE','%'.$search.'%');
    }
}