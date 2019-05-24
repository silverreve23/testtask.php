<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ClassModel;
use App\Models\StudentModel;

class ClassStudentSeeder extends Seeder
{
    const COUNT_ITEMS = 6;
    protected $table = 'students';
    public function run()
    {
        DB::table('class_student')->truncate();
        $classes = ClassModel::all()->take(self::COUNT_ITEMS);
        $students = StudentModel::all()->take(self::COUNT_ITEMS);
        $students->each(function($student) use($classes){
            $student->classes()->sync(
                $classes->random(2)->pluck('id')
            );
        });
    }
}
