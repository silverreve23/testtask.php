<?php

namespace App\Http\Validations;

use App\Http\Validations\BaseValidation;

class TeacherValidation extends BaseValidation
{

    public function rules()
    {
        return array(
            'first_name' => 'min:3|max:20',
            'last_name' => 'min:3|max:20',
            'job_title' => 'min:3|max:50',
            'age' => 'integer|min:17|max:25',
        );
    }
}
