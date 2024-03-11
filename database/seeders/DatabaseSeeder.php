<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            [
                'name' => 'John',
                'surname' => 'Doe',
                'birthday' => '1990-01-01'
            ],
            [
                'name' => 'Jane',
                'surname' => 'Smith',
                'birthday' => '1995-05-10'
            ],
            [
                'name' => 'Michael',
                'surname' => 'Johnson',
                'birthday' => '1992-09-15'
            ],
            [
                'name' => 'Emily',
                'surname' => 'Davis',
                'birthday' => '1998-03-25'
            ],
            [
                'name' => 'Daniel',
                'surname' => 'Wilson',
                'birthday' => '1994-07-12'
            ],
            [
                'name' => 'Sophia',
                'surname' => 'Brown',
                'birthday' => '1996-11-30'
            ]
        ]);
    }
}
