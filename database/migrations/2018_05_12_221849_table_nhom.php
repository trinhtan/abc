<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableNhom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        //
        Schema::create('nhom',function($table){
            $table->increments('id');
            $table->string('nhom', 10);
            $table->integer('id_lop')->unsigned();
            $table->string('danh_sach_sinh_vien');
            $table->integer('id_phong')->unsigned();
            $table->foreign('id_lop')->references('id')->on('lop');
            $table->foreign('id_phong')->references('id')->on('phong');
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
        Schema::dropIfExists('nhom');
    }
}
