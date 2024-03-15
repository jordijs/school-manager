<?php

namespace Tests\Feature;

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

    

}
