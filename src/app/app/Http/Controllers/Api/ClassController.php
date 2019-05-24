<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\ClassResource;
use App\Http\Validations\ClassValidation;

class ClassController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->validation = new ClassValidation;
    }
    public function index()
    {
        return ClassResource::collection(
            ClassModel::getClassAll()
        );
    }

    public function store()
    {

        if($this->validator()->fails())
            return $this->responseValidationError(
                $this->errors()->first()
            );
        return new ClassResource(
            ClassModel::create(
                request()->all()
            )
        );
    }

    public function show($id)
    {
        $student = ClassModel::find($id);
        if(!$student) return $this->responseTextError(
            self::NOT_FOUND
        );
        return new ClassResource($student);
    }

    public function update($id)
    {
        if($this->validator()->fails())
            return $this->responseValidationError(
                $this->errors()->first()
            );
        $updated = ClassModel::updateById(
            $id, request()->all()
        );
        return $this->response($updated);

    }

    public function destroy($id)
    {
        $destroyed = ClassModel::destroy($id);
        if(!$destroyed) return $this->responseTextError(
            self::NOT_DELETED
        );
        return response(self::OPERATION_SUCCESS);
    }
}
