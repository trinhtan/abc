<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableLop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('lop',function($table){
            $table->increments('id');
            $table->string('ma_lop', 10)->unique();
            $table->integer('id_hoc_phan')->unsigned();
            $table->string('danh_sach_sinh_vien');
            $table->string('kip', 10);
            $table->integer('id_ngay');->unsigned();
            $table->foreign('id_ngay')->references('id')->on('ngay');
            $table->foreign('id_hoc_phan')->references('id')->on('hoc_phan');
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
        Schema::dropIfExists('lop');
    }
}
