<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Grade::create([
            'student_id' => 1,
            'subject_id' => 1,
            'grade' => 8.7
        ]);

        Grade::create([
            'student_id' => 4,
            'subject_id' => 6,
            'grade' => 7.5
        ]);

        Grade::create([
            'student_id' => 2,
            'subject_id' => 2,
            'grade' => 9.2
        ]);

        Grade::create([
            'student_id' => 9,
            'subject_id' => 5,
            'grade' => 8.0
        ]);

        Grade::create([
            'student_id' => 3,
            'subject_id' => 3,
            'grade' => 8.5
        ]);

        Grade::create([
            'student_id' => 6,
            'subject_id' => 7,
            'grade' => 7.0
        ]);

        Grade::create([
            'student_id' => 5,
            'subject_id' => 4,
            'grade' => 2
        ]);

        Grade::create([
            'student_id' => 8,
            'subject_id' => 8,
            'grade' => 0
        ]);

        Grade::create([
            'student_id' => 7,
            'subject_id' => 1,
            'grade' => 10
        ]);
    }
}
