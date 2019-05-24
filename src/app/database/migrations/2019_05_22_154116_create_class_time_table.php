<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassTimeTable extends Migration
{
    public function up()
    {
        Schema::create('class_time', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('class_id');
            $table->string('day');
            $table->time('time');
            $table->timestamps();
            $table->unique(['class_id', 'day', 'time']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('class_time');
    }
}
