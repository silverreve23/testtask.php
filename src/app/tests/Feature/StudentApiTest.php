<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testsStudentCreate()
    {
        $payload = array(
            'first_name' => 'dasdadfdsg',
            'last_name' => 'dasdgfdfgas',
            'age' => 25,
        );
        $response = $this->json('POST', '/api/student', $payload);
        $response
            ->assertStatus(201)
            ->assertJson(array(
                'data' => array(
                    'first_name' => $payload['first_name'],
                    'last_name' => $payload['last_name'],
                    'age' => $payload['age'],
                )
            ));
    }
    public function testsStudentDelete()
    {
        $id = 47;
        $response = $this->json('DELETE', "/api/student/$id");
        $response->assertStatus(200);
    }
}
