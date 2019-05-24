<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 20);
            $table->string('last_name', 20);
            $table->tinyInteger('age')->default(17);
            $table->string('group');
            $table->timestamps();
            $table->unique(['first_name', 'last_name', 'age']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
}
