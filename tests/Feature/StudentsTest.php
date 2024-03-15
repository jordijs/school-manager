<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentsTest extends TestCase

{
    use RefreshDatabase;
    public function test_API_creates_a_new_student(): void
    {
        $fakeData = [
            'name' => 'FakeName',
            'surname' => 'FakeSurname',
            'birthday' => '1990-01-01'
        ];

        $response = $this->post('/api/students', $fakeData);

        $response->assertStatus(201);
        $response->assertJsonFragment($fakeData);
    }

    public function test_API_returns_all_students(): void
    {
        $this->seed();
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
        $this->seed();
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

    public function test_API_updates_data_of_student(): void
    {
        $this->seed();

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
        $this->seed();
        $response = $this->delete('/api/students/1');
        $response->assertStatus(200);
        $response->assertJsonFragment(['message' => 'Student deleted successfully']);
    }

    // public function test_API_returns_grades_of_student(): void
    // {
    //     $response = $this->get('/api/students/2/grades');
    //     $response->assertStatus(200);
    //     $response->assertJsonStructure([
    //         'grades' => [
    //             '*' => [
    //                 'id',
    //                 'student_id',
    //                 'subject_id',
    //                 'grade'
    //             ]
    //         ]
    //     ]);
    // }









}
