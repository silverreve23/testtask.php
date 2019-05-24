<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UpdateTrait;
use App\Models\Repositories\ClassRepository;
use App\Models\StudentModel;

class ClassModel extends Model
{
    use UpdateTrait;
    use ClassRepository;

    public $table = 'classes';
    protected $guarded = array('id');
    public const MID_TABLE_ID = 'class_id';
    private const MID_TABLE = 'class_student';

    public function students()
    {
        return $this->belongsToMany(
            StudentModel::class,
            self::MID_TABLE,
            self::MID_TABLE_ID,
            StudentModel::MID_TABLE_ID
        );
    }
    public function times()
    {
        return $this->hasMany(
            ClassTimeModel::class,
            self::MID_TABLE_ID
        );
    }
}
