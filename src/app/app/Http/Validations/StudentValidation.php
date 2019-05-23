<?php

namespace App\Http\Validations;

use App\Http\Validations\BaseValidation;

class StudentValidation extends BaseValidation
{

    public function rules()
    {
        return array(
            'first_name' => 'min:3|max:20',
            'last_name' => 'min:3|max:20',
            'age' => 'integer|min:17|max:25',
        );
    }
}
