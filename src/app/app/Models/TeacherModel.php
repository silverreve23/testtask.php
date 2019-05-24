<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UpdateTrait;

class TeacherModel extends Model
{
    use UpdateTrait;

    public $table = 'teachers';
    protected $guarded = array('id');
}
