<?php

namespace Tests\Feature;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentTest extends TestCase
{
    /** @test */
    public function indexMethod()
    {
        $response = $this->get('/students');
        $response->assertStatus(200);
    }

    /** @test */
    public function showMethod()
    {
        $data = Student::factory()->create();

        $response = $this->json('GET', '/student/' . $data->id);
        $response->assertStatus(200);
    }

    /** @test */
    public function storeMethod()
    {
        // create a new student
        $data = Student::factory()->make();

        // send a request to store the student
        $response = $this->json('POST', '/student/store', $data->toArray());

        // check the status of the response
        $response->assertStatus(200);
    }

    /** @test */
    public function updateMethod()
    {
        $data = Student::factory()->make();

        $response = $this->json('PUT', '/student/' . $data->id, $data->toArray());
        $response->assertStatus(200);
    }

    // /** @test */
    // public function destroyMethod()
    // {
    //     $data = Student::factory()->create();

    //     $response = $this->json('DELETE', '/student/' . $data->id);
    //     $response->assertStatus(200);
    // }
}
