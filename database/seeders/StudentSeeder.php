<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'name' => 'John',
            'surname' => 'Doe',
            'birthday' => '2010-05-12'
        ]);

        Student::create([
            'name' => 'Mary',
            'surname' => 'Johnson',
            'birthday' => '2011-10-01'
        ]);

        Student::create([
            'name' => 'Michael',
            'surname' => 'Smith',
            'birthday' => '2009-03-25'
        ]);

        Student::create([
            'name' => 'Jennifer',
            'surname' => 'Brown',
            'birthday' => '2010-12-30'
        ]);

        Student::create([
            'name' => 'James',
            'surname' => 'Wilson',
            'birthday' =>  '2011-07-15'
        ]);

        Student::create([
            'name' => 'Emma',
            'surname' => 'Martinez',
            'birthday' => '2009-11-20'
        ]);

        Student::create([
            'name' => 'Daniel',
            'surname' => 'Anderson',
            'birthday' => '2010-04-05'
        ]);

        Student::create([
            'name' => 'Olivia',
            'surname' => 'Taylor',
            'birthday' => '2011-09-10'
        ]);

        Student::create([
            'name' => 'David',
            'surname' => 'Thomas',
            'birthday' => '2009-02-15'
        ]);

    }
}
