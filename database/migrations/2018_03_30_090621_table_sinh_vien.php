<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableSinhVien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('sinh_vien',function($table){
            $table->increments('id');
            $table->string('ma_sinh_vien',10)->unique();
            $table->string('ho_ten',50);
            $table->string('danh_sach_lop', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('sinh_vien');
    }
}
