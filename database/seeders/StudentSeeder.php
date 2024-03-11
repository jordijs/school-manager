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
            'birthday' => '1990-01-01'
        ]);

        Student::create([
            'name' => 'Jane',
            'surname' => 'Doe',
            'birthday' => '1991-01-01'
        ]);
    
    }
}
