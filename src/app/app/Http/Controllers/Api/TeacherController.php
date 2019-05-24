<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\TeacherModel;
use App\Http\Resources\TeacherResource;
use App\Http\Validations\TeacherValidation;
use App\Http\Controllers\Api\BaseController;

class TeacherController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->validation = new TeacherValidation;
    }
    public function index()
    {
        return TeacherResource::collection(
            TeacherModel::all()
        );
    }

    public function store()
    {

        if($this->validator()->fails())
            return $this->responseValidationError(
                $this->errors()->first()
            );
        return new TeacherResource(
            TeacherModel::create(
                request()->all()
            )
        );
    }

    public function show($id)
    {
        $student = TeacherModel::find($id);
        if(!$student) return $this->responseTextError(
            self::NOT_FOUND
        );
        return new TeacherResource($student);
    }

    public function update($id)
    {
        if($this->validator()->fails())
            return $this->responseValidationError(
                $this->errors()->first()
            );
        $updated = TeacherModel::updateById(
            $id, request()->all()
        );
        return $this->response($updated);

    }

    public function destroy($id)
    {
        $destroyed = TeacherModel::destroy($id);
        if(!$destroyed) return $this->responseTextError(
            self::NOT_DELETED
        );
        return response(self::OPERATION_SUCCESS);
    }
}
