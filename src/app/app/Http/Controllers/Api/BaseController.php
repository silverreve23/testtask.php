<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    const HTTP_400 = 400;
    const HTTP_406 = 406;
    const OPERATION_SUCCESS = 'OK';
    const NOT_UPDATED = 'Not updated! Please try again later.';
    const NOT_DELETED = 'Not deleted! Please try again later.';
    const NOT_FOUND = 'Not found! Please try change id.';
    private $errors = null;
    public function __construct()
    {
        $this->errors = collect();
    }
    public function responseValidationError($error)
    {
        return response(
            'Error: '.$error,
            self::HTTP_400
        );
    }
    public function responseTextError($error)
    {
        return response(
            'Error: '.$error,
            self::HTTP_406
        );
    }
    protected function response($success){
        if(!$success) return $this->responseTextError(
            self::NOT_UPDATED
        );
        return response(self::OPERATION_SUCCESS);
    }
    protected function validator(){
        $valid = $this->validation->validate();
        $this->errors = $valid->errors();
        return $valid;
    }
    protected function errors(){
        return $this->errors;
    }
}
