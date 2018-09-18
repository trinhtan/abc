<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableHocPhan extends Migration
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
        Schema::create('hoc_phan',function($table){
            $table->increments('id');
            $table->string('ma_hoc_phan',10)->unique();
            $table->string('ten_hoc_phan',100)->unique();
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
        Schema::dropIfExists('hoc_phan');
    }
}
