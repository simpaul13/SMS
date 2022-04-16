<?php

namespace Tests\Feature;

use App\Models\Subject;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubjectTest extends TestCase
{
    /** @test */
    public function indexMethod()
    {
        $response = $this->get('/subjects');
        $response->assertStatus(200);
    }

    /** @test */
    public function showMethod()
    {
        $data = Subject::factory()->create();

        $response = $this->json('GET', '/subject/' . $data->id);
        $response->assertStatus(200);
    }

    /** @test */
    public function storeMethod()
    {
        // create a new subject
        $data = Subject::factory()->make();

        // send a request to store the subject
        $response = $this->json('POST', '/subject/store', $data->toArray());

        // check the status of the response
        $response->assertStatus(200);
    }

    /** @test */
    public function updateMethod()
    {
        // create a new subject
        $old_data = Subject::factory()->create();

        // send a request to update the subject
        $data = Subject::factory()->make();

        // send a request to update the subject
        $response = $this->json('PUT', "/subject/{$old_data->id}/update", $data->toArray());

        // check the status of the response
        $response->assertStatus(200);
    }

    /** @test */
    public function destroyMethod()
    {
        // create a new subject
        $data = Subject::factory()->create();

        // send a request to delete the subject
        $response = $this->json('DELETE', "/subject/{$data->id}/destroy");

        // check the status of the response
        $response->assertStatus(200);
    }
}
