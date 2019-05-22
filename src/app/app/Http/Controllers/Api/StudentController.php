<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\StudentModel;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function index()
    {
        return response()->json(
            StudentModel::all()
        );
    }

    public function create()
    {
        return StudentModel::create(
            request()->all()
        );
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
