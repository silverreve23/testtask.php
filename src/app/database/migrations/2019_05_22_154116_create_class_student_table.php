<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassStudentTable extends Migration
{
    public function up()
    {
        Schema::create('class_student', function (Blueprint $table) {
            $table->integer('student_id');
            $table->integer('class_id');
            // $table->foreign('student_id')
            //     ->references('id')
            //     ->on('students')
            //     ->onDelete('cascade');
            // $table->foreign('class_id')
            //     ->references('id')
            //     ->on('classes')
            //     ->onDelete('cascade');
        });
    }

    public function down()
    {
        // Schema::table('class_student', function(Blueprint $table){
        //     $table->dropForeign('class_student_class_id_foreign');
        //     $table->dropForeign('class_student_student_id_foreign');
        // });
        Schema::dropIfExists('class_student');
    }
}
