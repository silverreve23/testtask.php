<?php

namespace App\Models\Repositories;

trait ClassRepository {
    protected function getAllStudents($id){
        return $this
            ->find($id)
            ->students()
            ->get();
    }
    protected function getAllStudentsGroup($id){
        return $this
            ->find($id)
            ->students()
            ->groupBy(array(
                'students.group',
            ))
            ->get(array('group'));
    }
    protected function getDaily($id){
        return $this
            ->select('class_time.day')
            ->addSelect('classes.id')
            ->addSelect('classes.title')
            ->leftJoin('class_time', 'class_time.class_id', 'classes.id')
            ->where('classes.id', $id)
            ->groupBy(array(
                'class_time.day',
                'classes.id',
            ))
            ->get();
    }
    protected function getClassAll(){
        return $this
            ->join('class_time', 'class_time.class_id', 'classes.id')
            ->get();
    }
}
