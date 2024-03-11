<?php

namespace Tests\Feature;

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

        $response = $this->post('/api/students', $fakeData );

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
