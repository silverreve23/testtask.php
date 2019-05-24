<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Repositories\StudentRepository;
use App\Models\Traits\UpdateTrait;
use App\Models\ClassModel;

class StudentModel extends Model
{
    use UpdateTrait;
    use StudentRepository;

    public $table = 'students';
    protected $guarded = array('id');
    public const MID_TABLE_ID = 'student_id';
    private const MID_TABLE = 'class_student';

    public function classes()
    {
        return $this->belongsToMany(
            ClassModel::class,
            self::MID_TABLE,
            self::MID_TABLE_ID,
            ClassModel::MID_TABLE_ID
        );
    }
}
