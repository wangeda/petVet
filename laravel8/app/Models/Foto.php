<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;
	protected $table = 'foto';
	protected $guarded = [];
	public $timestamps = false;
	
	public function setImgAttribute($request){
		$foto = base64_encode(file_get_contents($request));
		$this->attributes['img'] = $foto;
	}
}
