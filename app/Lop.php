<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
    //
    protected $table = "lop";
    public $timestamps = false;

    public function hocPhan(){
    	return $this->belongsTo('App\HocPhan','id_hoc_phan','id');
    }

    public function nhom(){
    	return $this->hasMany('App\Nhom', 'id_lop', 'id');
    }

    public function ngay(){
    	return $this->belongsTo('App\Ngay', 'id_ngay', 'id');
    }
}