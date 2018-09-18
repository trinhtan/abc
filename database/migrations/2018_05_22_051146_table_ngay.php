<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableNgay extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('ngay',function($table){
            $table->increments('id');
            $table->string('ngay_thi_thu', 10);
            $table->date('ngay')->unique();
            $table->string('danh_sach_lop' );
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
        Schema::dropIfExists('ngay');
    }
}
