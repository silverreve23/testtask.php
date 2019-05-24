<?php

namespace App\Http\Validations;

use App\Http\Validations\BaseValidation;

class TeacherValidation extends BaseValidation
{

    public function rules()
    {
        return array(
            'first_name' => 'required|min:3|max:20',
            'last_name' => 'required|min:3|max:20',
            'job_title' => 'required|min:3|max:50',
            'age' => 'required|integer|min:17|max:25',
        );
    }
}
