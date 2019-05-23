<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\StudentModel;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\StudentResource;
use App\Http\Validations\StudentValidation;

class StudentController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->validation = new StudentValidation;
    }
    public function index()
    {
        return StudentResource::collection(
            StudentModel::all()
        );
    }

    public function store()
    {

        if($this->validator()->fails())
            return $this->responseValidationError(
                $this->errors()->first()
            );
        return new StudentResource(
            StudentModel::create(
                request()->all()
            )
        );
    }

    public function show($id)
    {
        $student = StudentModel::find($id);
        if(!$student) return $this->responseTextError(
            self::NOT_FOUND
        );
        return new StudentResource($student);
    }

    public function update($id)
    {
        if($this->validator()->fails())
            return $this->responseValidationError(
                $this->errors()->first()
            );
        $updated = StudentModel::updateById(
            $id, request()->all()
        );
        return $this->response($updated);

    }

    public function destroy($id)
    {
        $destroyed = StudentModel::destroy($id);
        if(!$destroyed) return $this->responseTextError(
            self::NOT_DELETED
        );
        return response(self::OPERATION_SUCCESS);
    }
}
