<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HocPhan extends Model
{
    //
    protected $table = "hoc_phan";
    public $timestamps = false;

    public function lop(){
    	return $this->hasMany('App\Lop','id_hoc_phan','id');
    }
}
