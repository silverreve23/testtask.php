<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesTable extends Migration
{
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 20);
            $table->tinyInteger('day');
            $table->time('time');
            $table->tinyInteger('teacher_id')->nullable();
            $table->timestamps();
            $table->unique(['title', 'teacher_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('classes');
    }
}
