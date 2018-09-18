<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ngay extends Model
{
    //
    protected $table = "ngay";
    public $timestamps = false;

    public function lop(){
    	
    	return $this->hasMany('App\Lop', 'id_ngay', 'id');
    }
}