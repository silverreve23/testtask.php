<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UpdateTrait;
use App\Models\StudentModel;

class ClassTimeModel extends Model
{
    public $table = 'class_time';
    protected $guarded = array('id');
}
