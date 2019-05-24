<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 20);
            $table->string('last_name', 20);
            $table->string('job_title', 50);
            $table->tinyInteger('age')->default(17);
            $table->timestamps();
            $table->unique(['first_name', 'last_name', 'age']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
