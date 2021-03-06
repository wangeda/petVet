<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
	
	protected $guarded =[];
	protected $casts = ['date_of_birth' => 'datetime:Y-m-d'];

	
	public function departments()
    {
		return $this->belongsTo(Department::class, 'department_id', 'id');
    }
	
	
	
	
	public function getAge($birthday)
    {
   	 $today = \Carbon\Carbon::now();
   	 $diff = $today->diffInMonths($birthday);
	 if ($diff > 12){
		 $diff = floor($diff/12) . ' years';
	   	 return $diff;

	 }else{
		 return $diff . ' months';
	 }
    }
	
	
}
