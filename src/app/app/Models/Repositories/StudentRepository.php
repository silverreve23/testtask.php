<?php

namespace App\Models\Repositories;

trait StudentRepository {
    protected function getAllClasses($id){
        return $this
            ->find($id)
            ->classes()
            ->join('class_time', 'classes.id', 'class_time.class_id')
            ->join('teachers', 'teachers.id', 'classes.teacher_id')
            ->get(array(
                'classes.*',
                'class_time.day',
                'class_time.time',
                'teachers.first_name as teacher_first_name',
                'teachers.last_name as teacher_last_name',
            ));
    }
}
