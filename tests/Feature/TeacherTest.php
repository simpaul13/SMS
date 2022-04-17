<?php

namespace Tests\Feature;

use App\Models\Teacher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TeacherTest extends TestCase
{
    /** @test */
    public function indexMethod()
    {
        $response = $this->get('/teachers');
        $response->assertStatus(200);
    }

    /** @test */
    public function showMethod()
    {
        $data = Teacher::factory()->create();

        $response = $this->json('GET', '/teacher/' . $data->teacher_id);
        $response->assertStatus(200);
    }

    /** @test */
    public function storeMethod()
    {
        // create a new teacher
        $data = Teacher::factory()->make();

        // send a request to store the teacher
        $response = $this->json('POST', '/teacher/store', $data->toArray());

        // check the status of the response
        $response->assertStatus(200);
    }

    /** @test */
    public function updateMethod()
    {
        // create a new teacher
        $old_data = Teacher::factory()->create();

        // send a request to update the teacher
        $data = Teacher::factory()->make();

        // send a request to update the teacher
        $response = $this->json('PUT', "/teacher/{$old_data->teacher_id}/update", $data->toArray());

        // check the status of the response
        $response->assertStatus(200);
    }

    /** @test */
    public function destroyMethod()
    {
        // create a new teacher
        $data = Teacher::factory()->create();

        // send a request to destroy the teacher
        $response = $this->json('DELETE', '/teacher/' . $data->teacher_id . '/destroy');
        $response->assertStatus(200);
    }
}
