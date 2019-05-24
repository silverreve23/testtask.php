<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ClassModel;

class ClassSeeder extends Seeder
{
    const COUNT_ITEMS = 6;
    protected $table = 'classes';
    public function run()
    {
        DB::table($this->table)->truncate();
        factory(ClassModel::class, self::COUNT_ITEMS)->create();
    }
}
