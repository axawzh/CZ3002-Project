<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course')->insert([
            'courseCode' => 'CZ3001',
            'courseName' => 'Advanced Computer Architecture',
        ]);

        DB::table('course')->insert([
            'courseCode' => 'CZ3002',
            'courseName' => 'Advanced Software Engineering',
        ]);

        DB::table('course')->insert([
            'courseCode' => 'CZ3003',
            'courseName' => 'Software System Analysis and Design',
        ]);
    }
}
