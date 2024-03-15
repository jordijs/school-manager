<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GradesTest extends TestCase
{

    use RefreshDatabase;

    // POST /grades
    public function test_API_creates_a_new_grade(): void
    {
        $this->seed();
        $inputData = [
            'student_id' => 1,
            'subject_id' => 1,
            'grade' => 8
        ];
        $response = $this->post('/api/grades', $inputData);
        $response->assertStatus(201);
        $response->assertJsonFragment($inputData);
    }


    // GET /grades
    public function test_API_returns_all_grades(): void
    {
        $this->seed();
        $response = $this->get('/api/grades');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'grades' => [
                [
                    'id',
                    'student_id',
                    'subject_id',
                    'grade'
                ]
            ]
        ]);
    }

    // GET /grades/{id}
    public function test_API_returns_a_grade(): void
    {
        $this->seed();
        $response = $this->get('/api/grades/1');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'grade' => [
                'id',
                'student_id',
                'subject_id',
                'grade'
            ]
        ]);
    }

    // GET /students/grades/average
    public function test_API_returns_average_grade(): void
    {
        $this->seed();
        $response = $this->get('/api/students/grades/average');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'message' => 'Average retrieved successfully',
        ]);
        $this->assertIsFloat($response->json('average'));
    }

    // PUT /grades/{id}
    public function test_API_edits_a_grade(): void
    {
        $this->seed();
        $inputData = [
            'grade' => 9
        ];
        $response = $this->put('/api/grades/1', $inputData);
        $response->assertStatus(200);
        $response->assertJsonFragment($inputData);
    }

    // DELETE /grades/{id}
    public function test_API_deletes_a_grade(): void
    {
        $this->seed();
        $response = $this->delete('/api/grades/1');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'message' => 'Grade deleted successfully'
        ]);
    }
}
