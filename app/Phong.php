<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phong extends Model
{
 
	protected $table = "phong";
    public$timestamps = false;

    public function nhom(){

    	return $this->hasMany('App\Nhom', 'id_phong', 'id');
    }
    
}