<?php

namespace App\Http\Validations;

use App\Http\Validations\BaseValidation;

class ClassValidation extends BaseValidation
{

    public function rules()
    {
        return array(
            'title' => 'min:3|max:50',
            'day' => 'min:1|max:7',
            'time' => 'date_format:H:i:s',
            'teacher_id' => 'integer',
        );
    }
}
