<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\TeacherModel;

class TeacherSeeder extends Seeder
{
    const COUNT_ITEMS = 3;
    protected $table = 'teachers';
    public function run()
    {
        DB::table($this->table)->truncate();
        factory(TeacherModel::class, self::COUNT_ITEMS)->create();
    }
}
