<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nhom extends Model
{
    //
    protected $table = "nhom";
    public $timestamps = false;

    public function lop(){
    	return $this->belongsTo('App\Lop','id_lop','id');
    }

    public function phong(){

    	return $this->belongsTo('App\Phong', 'id_phong', 'id');
    }
}
