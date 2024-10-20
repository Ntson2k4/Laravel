<?php

namespace Tests\Feature\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;
use App\Models\User;

class TaskTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    //b5
    use RefreshDatabase;

    public function test_user_can_create_task()
    {
        $user = User::factory()->create(['is_admin' => true]);
        $this->actingAs($user);

        $response = $this->post(route('tasks.store'), [
            'title' => 'New Task',
            'description' => 'New Description',
        ]);

        $response->assertStatus(201);
        $response->assertJson([
            'title' => 'New Task',
            'description' => 'New Description',
        ]);
        $this->assertDatabaseHas('tasks', ['title' => 'New Task']);
    }

    public function test_user_can_read_task()
    {
        $task = Task::factory()->create(['title' => 'Existing Task']);
        $user = User::factory()->create(['is_admin' => true]);
        $this->actingAs($user);

        $response = $this->get(route('tasks.show', $task->id));
        $response->assertStatus(200);
        $response->assertSee('Existing Task');
    }

    public function test_user_can_update_task()
    {
        $task = Task::factory()->create(['title' => 'Old Task']);
        $user = User::factory()->create(['is_admin' => true]);
        $this->actingAs($user);

        $response = $this->put(route('tasks.update', $task->id), [
            'title' => 'Updated Task',
            'description' => 'Updated Description',
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'title' => 'Updated Task',
            'description' => 'Updated Description',
        ]);
        $this->assertDatabaseHas('tasks', ['title' => 'Updated Task']);
    }

    public function test_user_can_delete_task()
    {
        $task = Task::factory()->create(['title' => 'Task to be deleted']);
        $user = User::factory()->create(['is_admin' => true]);
        $this->actingAs($user);

        $response = $this->delete(route('tasks.destroy', $task->id));
        $response->assertStatus(204);
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }

    public function test_non_admin_cannot_create_task()
    {
        $user = User::factory()->create(['is_admin' => false]);
        $this->actingAs($user);

        $response = $this->post(route('tasks.store'), [
            'title' => 'Unauthorized Task',
            'description' => 'This should not be created',
        ]);

        $response->assertStatus(403);
    }
}
