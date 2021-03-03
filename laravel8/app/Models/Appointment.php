<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
	public $timestamps = false;
	
	public function pets()
    {
		return $this->belongsTo(Pet::class, 'pet_id', 'id');
    }
	
	public function procedures()
    {
		return $this->hasOne(Procedure::class, 'procedure_id', 'id');
    }
}
