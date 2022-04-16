<?php

namespace Tests\Feature;

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CourseTest extends TestCase
{
    /** @test */
    public function indexMethod()
    {
        $response = $this->get('/courses');
        $response->assertStatus(200);
    }

    /** @test */
    public function showMethod()
    {
        $data = Course::factory()->create();

        $response = $this->json('GET', '/course/' . $data->id);
        $response->assertStatus(200);
    }

    /** @test */
    public function storeMethod()
    {
        // create a new course
        $data = Course::factory()->make();

        // send a request to store the course
        $response = $this->json('POST', '/course/store', $data->toArray());

        // check the status of the response
        $response->assertStatus(200);
    }

    /** @test */
    public function updateMethod()
    {
        // create a new course
        $old_data = Course::factory()->create();

        // send a request to update the course
        $data = Course::factory()->make();

        // send a request to update the course
        $response = $this->json('PUT', "/course/{$old_data->id}/update", $data->toArray());

        // check the status of the response
        $response->assertStatus(200);

    }

    /** @test */
    public function destroyMethod()
    {
        // create a new course
        $data = Course::factory()->create();

        // send a request to delete the course
        $response = $this->json('DELETE', "/course/{$data->id}/destroy");

        // check the status of the response
        $response->assertStatus(200);
    }
}
