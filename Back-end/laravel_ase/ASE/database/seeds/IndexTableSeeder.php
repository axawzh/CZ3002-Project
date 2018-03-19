<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndexTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('index')->insert([
            'indexNo' => 10001,
            'noOfGroup' => 2,
            'groupSize' => 4,
            'courseCode' => 'CZ3001',
        ]);

        DB::table('index')->insert([
            'indexNo' => 10002,
            'noOfGroup' => 2,
            'groupSize' => 4,
            'courseCode' => 'CZ3001',
        ]);

        DB::table('index')->insert([
            'indexNo' => 10011,
            'noOfGroup' => 2,
            'groupSize' => 4,
            'courseCode' => 'CZ3002',
        ]);

        DB::table('index')->insert([
            'indexNo' => 10012,
            'noOfGroup' => 2,
            'groupSize' => 4,
            'courseCode' => 'CZ3002',
        ]);

        DB::table('index')->insert([
            'indexNo' => 10021,
            'noOfGroup' => 2,
            'groupSize' => 4,
            'courseCode' => 'CZ3003',
        ]);

        DB::table('index')->insert([
            'indexNo' => 10022,
            'noOfGroup' => 2,
            'groupSize' => 4,
            'courseCode' => 'CZ3003',
        ]);
    }
}
