<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UpdateTrait;

class ClassModel extends Model
{
    use UpdateTrait;

    public $table = 'classes';
    protected $guarded = array('id');
}
