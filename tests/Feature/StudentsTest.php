<?php

namespace Tests\Feature;

use Database\Seeders\StudentSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentsTest extends TestCase

{
    use RefreshDatabase;
    public function test_API_creates_a_new_student(): void
    {
        $inputData = [
            'name' => 'Mark',
            'surname' => 'Down',
            'birthday' => '2000-01-01'
        ];
        $response = $this->post('/api/students', $inputData);
        $response->assertStatus(201);
        $response->assertJsonFragment($inputData);
    }

    public function test_API_returns_all_students(): void
    {
        $this->seed(StudentSeeder::class);
        $response = $this->get('/api/students');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'students' => [
                [
                    'id',
                    'name',
                    'surname',
                    'birthday'
                ]
            ]
        ]);
    }

    public function test_API_returns_a_student(): void
    {
        $this->seed(StudentSeeder::class);
        $response = $this->get('/api/students/1');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'student' => [
                'id',
                'name',
                'surname',
                'birthday'
            ]
        ]);
    }

    public function test_API_returns_average_grade_by_student(): void
    {
        $this->seed();
        $response = $this->get('/api/students/1/grades/average');
        $response->dump();
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'message' => 'Average retrieved successfully'
        ]);
        $this->assertIsFloat($response->json('average'));
    }

    public function test_API_updates_data_of_student(): void
    {
        $this->seed(StudentSeeder::class);
        $fakeData = [
            'name' => 'FakeName',
            'surname' => 'FakeSurname',
            'birthday' => '1990-01-01'
        ];
        $response = $this->put('/api/students/1', $fakeData);
        $response->assertStatus(200);
        $response->assertJsonFragment($fakeData);
    }

    public function test_API_deletes_a_student(): void
    {
        $this->seed(StudentSeeder::class);
        $response = $this->delete('/api/students/1');
        $response->assertStatus(200);
        $response->assertJsonFragment(['message' => 'Student deleted successfully']);
    }
}
