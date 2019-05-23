<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\StudentModel;

class StudentSeeder extends Seeder
{
    const COUNT_ITEMS = 3;
    protected $table = 'students';
    public function run()
    {
        DB::table($this->table)->truncate();
        factory(StudentModel::class, self::COUNT_ITEMS)->create();
    }
}
