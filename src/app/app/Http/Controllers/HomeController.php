<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentModel;
use App\Models\ClassModel;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $classesAll = StudentModel::getAllClasses(1);
        $classDaily = ClassModel::getDaily(2);
        $studentsAll = ClassModel::getAllStudents(2);
        $studentsGroup = ClassModel::getAllStudentsGroup(2);
        dd(
            'classes by stydent 1', $classesAll,
            'students by class 2', $studentsAll,
            'student by class 2 (grouped)', $studentsGroup,
            'classes by daily', $classDaily
        );
        return view('home');
    }
}
