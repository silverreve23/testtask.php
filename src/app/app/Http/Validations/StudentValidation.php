<?php

namespace App\Http\Validations;

use App\Http\Validations\BaseValidation;

class StudentValidation extends BaseValidation
{

    public function rules()
    {
        return array(
            'first_name' => 'required|min:3|max:20',
            'last_name' => 'required|min:3|max:20',
            'age' => 'required|integer|min:17|max:25',
            'group' => 'required|min:2|max:8',
        );
    }
}
