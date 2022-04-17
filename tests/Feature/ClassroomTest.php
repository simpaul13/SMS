<?php

namespace Tests\Feature;

use App\Models\Classroom;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClassroomTest extends TestCase
{
    /** @test */
    public function indexMethod()
    {
        $response = $this->get('/classrooms');
        $response->assertStatus(200);
    }

    /** @test */
    public function showMethod()
    {
        $data = Classroom::factory()->create();

        $response = $this->json('GET', '/classroom/' . $data->id);
        $response->assertStatus(200);
    }

    /** @test */
    public function storeMethod()
    {
        // create a new classroom
        $data = Classroom::factory()->make();

        // send a request to store the classroom
        $response = $this->json('POST', '/classroom/store', $data->toArray());

        // check the status of the response
        $response->assertStatus(200);
    }

    /** @test */
    public function updateMethod()
    {
        // create a new classroom
        $old_data = Classroom::factory()->create();

        // send a request to update the classroom
        $data = Classroom::factory()->make();

        // send a request to update the classroom
        $response = $this->json('PUT', "/classroom/{$old_data->id}/update", $data->toArray());

        // check the status of the response
        $response->assertStatus(200);

    }

    /** @test */
    public function destroyMethod()
    {
        // create a new classroom
        $data = Classroom::factory()->create();

        // send a request to destroy the classroom
        $response = $this->json('DELETE', "/classroom/{$data->id}/destroy");

        // check the status of the response
        $response->assertStatus(200);
    }
}
