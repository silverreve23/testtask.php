<?php

namespace App\Http\Validations\Contracts;

interface ValidationInterface {
    public function rules();
    public function validate();
}
