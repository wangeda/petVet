<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    use HasFactory;
	
	public function appointments()
    {
		return $this->belongTo(Appointment::class);
    }
	
		public function departments()
    {
		return $this->belongTo(Department::class, 'department_id', 'id');
    }
	
}
