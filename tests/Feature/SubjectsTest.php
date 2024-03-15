<?php

namespace Tests\Feature;

use Database\Seeders\SubjectSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubjectsTest extends TestCase
{

    use RefreshDatabase;

    public function test_API_creates_a_new_subject(): void
    {
        $inputData = [
            'name' => 'Algebra',
            'school_year' => 1,
        ];
        $response = $this->post('/api/subjects', $inputData);
        $response->assertStatus(201);
        $response->assertJsonFragment($inputData);
    }

    public function test_API_returns_all_subjects(): void
    {
        $this->seed(SubjectSeeder::class);
        $response = $this->get('/api/subjects');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'subjects' => [
                [
                    'id',
                    'name',
                    'school_year'
                ]
            ]
        ]);
    }

    public function test_API_returns_a_subject(): void
    {
        $this->seed(SubjectSeeder::class);
        $response = $this->get('/api/subjects/1');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'subject' => [
                'id',
                'name',
                'school_year'
            ]
        ]);
    }

    public function test_API_updates_data_of_subject(): void
    {
        $this->seed(SubjectSeeder::class);
        $inputData = [
            'school_year' => 4,
        ];
        $response = $this->put('/api/subjects/1', $inputData);
        $response->assertStatus(200);
        $response->assertJsonFragment($inputData);
    }

    public function test_API_deletes_a_subject(): void
    {
        $this->seed(SubjectSeeder::class);
        $response = $this->delete('/api/subjects/1');
        $response->assertStatus(200);
        $response->assertJsonFragment(['message' => 'Subject deleted successfully']);
    }
}
