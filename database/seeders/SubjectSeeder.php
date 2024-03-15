<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subject::create([
            'name' => 'Mathematics',
            'school_year' => 1
        ]);

        Subject::create([
            'name' => 'History',
            'school_year' => 1
        ]);

        Subject::create([
            'name' => 'Literature',
            'school_year' => 2
        ]);

        Subject::create([
            'name' => 'Sociology',
            'school_year' => 2
        ]);

        Subject::create([
            'name' => 'Physical Education',
            'school_year' => 3
        ]);

        Subject::create([
            'name' => 'Biology',
            'school_year' => 3
        ]);

        Subject::create([
            'name' => 'Latin',
            'school_year' => 4
        ]);

        Subject::create([
            'name' => 'Greek',
            'school_year' => 4
        ]);
    }
}
