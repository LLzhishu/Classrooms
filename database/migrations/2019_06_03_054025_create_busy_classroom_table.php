<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusyClassroomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('busyClassrooms', function (Blueprint $table) {
            $table->integer('classroom_id');//教室id
            $table->integer('month');//月份
            $table->integer('day');//日期
            $table->integer('time');//时间段
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('busyClassrooms');
    }
}
