<?php

namespace App\Http\Validations;

use App\Http\Validations\Contracts\ValidationInterface;
use Validator;

class BaseValidation implements ValidationInterface
{

    public function rules()
    {
        return array();
    }

    public function validate(){
        return Validator::make(
            request()->all(),
            $this->rules()
        );
    }
}
