<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Task;

class TaskControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_index_returns_tasks_view()
    {
        $user = User::factory()->create([
            'role' => 'admin',
        ]);
    
        $this->actingAs($user);

        Task::factory()->create();

        $response = $this->get(route('tasks.index'));

        $response->assertStatus(200);
        $response->assertViewIs('tasks.index');
        $response->assertViewHas('tasks');
    }

    public function test_store_creates_task()
    {
        $user = User::factory()->create([
            'role' => 'user', 
        ]);
    
        $this->actingAs($user);

        $response = $this->post(route('tasks.store'), [
            'name' => 'Test Task',
            'description' => 'Task description'
        ]);

        $response->assertRedirect(route('tasks.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('tasks', [
            'name' => 'Test Task',
            'description' => 'Task description',
            'user_id' => $user->id,
        ]);
    }

    public function test_update_task()
    {
        $user = User::factory()->create([
            'role' => 'user', // Nếu cần kiểm tra quyền admin
        ]);
    
        $this->actingAs($user);
        $task = Task::factory()->create(['user_id' => $user->id]);

        // Gửi yêu cầu để cập nhật nhiệm vụ
        $response = $this->put(route('tasks.update', $task->id), [
            'name' => 'Updated Task',
            'description' => 'Updated description'
        ]);

        // Kiểm tra phản hồi
        $response->assertRedirect(route('tasks.index'));
        $response->assertSessionHas('success');

        // Kiểm tra rằng nhiệm vụ đã được cập nhật
        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'name' => 'Updated Task',
            'description' => 'Updated description',
        ]);
    }

    public function test_destroy_task()
    {
        $user = User::factory()->create([
            'role' => 'editor', // Nếu cần kiểm tra quyền admin
        ]);
    
        $this->actingAs($user);
        $task = Task::factory()->create(['user_id' => $user->id]);

         // Gửi yêu cầu để xóa nhiệm vụ
        $response = $this->delete(route('tasks.destroy', $task->id));

        // Kiểm tra phản hồi
        $response->assertRedirect(route('tasks.index'));
        $response->assertSessionHas('success', 'Task deleted successfully.');

        // Kiểm tra rằng nhiệm vụ đã bị xóa
        $this->assertDatabaseMissing('tasks', [
            'id' => $task->id,
        ]);
    }
}
