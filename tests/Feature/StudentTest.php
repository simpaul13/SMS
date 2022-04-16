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
        // create a new student
        $old_data = Student::factory()->create();

        // send a request to update the student
        $data = Student::factory()->make();

        // send a request to update the student
        $response = $this->json('PUT', "/student/{$old_data->id}/update", $data->toArray());

        // check the status of the response
        $response->assertStatus(200);

    }

    /** @test */
    public function destroyMethod()
    {
        // create a new student
        $data = Student::factory()->create();

        // send a request to delete the student
        $response = $this->json('DELETE', '/student/' . $data->id . '/destroy');
        $response->assertStatus(200);
    }
}
