<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;
	
	protected $guarded = [];
	protected $casts = ['vaccination_date' => 'datetime:Y-m-d', 
						'date_of_birth' => 'datetime:Y-m-d'];

	
	public function customers()
    {
		return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
	
	public function genders()
    {
		return $this->belongsTo(Gender::class, 'gender_id', 'id');
    }
	
	public function appointments()
    {
		return $this->hasMany(Appoinmetn::class);
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
