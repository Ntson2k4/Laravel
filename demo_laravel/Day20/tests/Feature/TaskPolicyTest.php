<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Task;

class TaskPolicyTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_admin_can_view_task()
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $task = Task::factory()->create();

        $response = $this->actingAs($admin)->get('/tasks/' . $task->id);
        $response->assertStatus(200);
        $response->assertSee($task->title);
    }

    public function test_non_admin_cannot_view_task()
    {
        $user = User::factory()->create(['is_admin' => false]);
        $task = Task::factory()->create();

        $response = $this->actingAs($user)->get('/tasks/' . $task->id);
        $response->assertStatus(403);
    }

    public function test_admin_can_create_task()
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->post('/tasks', [
            'title' => 'New Task',
            'description' => 'Task Description',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('tasks', ['title' => 'New Task']);
    }

    public function test_non_admin_cannot_create_task()
    {
        $user = User::factory()->create(['is_admin' => false]);

        $response = $this->actingAs($user)->post('/tasks', [
            'title' => 'New Task',
            'description' => 'Task Description',
        ]);

        $response->assertStatus(403);
    }

    public function test_admin_can_update_task()
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $task = Task::factory()->create(['title' => 'Old Task']);

        $response = $this->actingAs($admin)->put('/tasks/' . $task->id, [
            'title' => 'Updated Task',
            'description' => 'Updated Description',
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('tasks', ['title' => 'Updated Task']);
    }

    public function test_non_admin_cannot_update_task()
    {
        $user = User::factory()->create(['is_admin' => false]);
        $task = Task::factory()->create(['title' => 'Old Task']);

        $response = $this->actingAs($user)->put('/tasks/' . $task->id, [
            'title' => 'Updated Task',
            'description' => 'Updated Description',
        ]);

        $response->assertStatus(403);
    }

    public function test_admin_can_delete_task()
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $task = Task::factory()->create(['title' => 'Task to be deleted']);

        $response = $this->actingAs($admin)->delete('/tasks/' . $task->id);
        $response->assertStatus(204);

        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }

    public function test_non_admin_cannot_delete_task()
    {
        $user = User::factory()->create(['is_admin' => false]);
        $task = Task::factory()->create(['title' => 'Task to be deleted']);

        $response = $this->actingAs($user)->delete('/tasks/' . $task->id);
        $response->assertStatus(403);
    }
}
