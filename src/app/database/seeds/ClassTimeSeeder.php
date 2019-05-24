<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ClassModel;
use App\Models\ClassTimeModel;

class ClassTimeSeeder extends Seeder
{
    const COUNT_ITEMS = 6;
    protected $table = 'students';
    public function run()
    {
        DB::table('class_time')->truncate();
        $classes = ClassModel::all()->take(self::COUNT_ITEMS);
        $classes->each(function($class){
            $times = factory(ClassTimeModel::class, self::COUNT_ITEMS)->make();
            $class->times()->saveMany($times);
        });
    }
}
