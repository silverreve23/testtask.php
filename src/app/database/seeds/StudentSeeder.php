<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->truncate();
        foreach(range(1, 2) as $i)
            DB::table('students')->insert([
                'first_name' => Str::random(10),
                'last_name' => Str::random(10),
                'age' => rand(17, 25),
            ]);
    }
}
