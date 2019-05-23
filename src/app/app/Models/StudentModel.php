<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UpdateTrait;

class StudentModel extends Model
{
    use UpdateTrait;

    public $table = 'students';
    protected $guarded = array('id');
}
