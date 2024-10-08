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
        // Tạo một user admin
        $user = User::factory()->create(['is_admin' => true]);
        $this->actingAs($user); // Đặt user đang đăng nhập

        $response = $this->post('/tasks', [
            'title' => 'New Task',
            'description' => 'New Description',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('tasks', ['title' => 'New Task']);
    }

    public function test_user_can_read_task()
    {
        $task = Task::factory()->create(['title' => 'Existing Task']);

        $response = $this->get('/tasks/' . $task->id);
        $response->assertStatus(200);
        $response->assertSee('Existing Task');
    }

    public function test_user_can_update_task()
    {
        $task = Task::factory()->create(['title' => 'Old Task']);
        $user = User::factory()->create(['is_admin' => true]);
        $this->actingAs($user); // Đặt user đang đăng nhập

        $response = $this->put('/tasks/' . $task->id, [
            'title' => 'Updated Task',
            'description' => 'Updated Description',
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('tasks', ['title' => 'Updated Task']);
    }

    public function test_user_can_delete_task()
    {
        $task = Task::factory()->create(['title' => 'Task to be deleted']);
        $user = User::factory()->create(['is_admin' => true]);
        $this->actingAs($user); // Đặt user đang đăng nhập

        $response = $this->delete('/tasks/' . $task->id);
        $response->assertStatus(204); 
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }

    public function test_non_admin_cannot_create_task()
    {
        $user = User::factory()->create(['is_admin' => false]);
        $this->actingAs($user);

        $response = $this->post('/tasks', [
            'title' => 'Unauthorized Task',
            'description' => 'This should not be created',
        ]);

        $response->assertStatus(403);
    }
}
