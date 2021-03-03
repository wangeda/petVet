<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
	
	protected $guarded = [];
	
	public function suppliers()
    {
		return $this->hasMany(Supplier::class);
    }
	
	public function customers()
    {
		return $this->belongsToMany(Customer::class);
    }
	
	public function categories()
	{
		return $this->belongsTo(Category::class, 'category_id', 'id');
    }
	
	
	public function setImgAttribute($request){
		$foto = base64_encode(file_get_contents($request));
		$this->attributes['img'] = $foto;
	}
	
	
	
}
