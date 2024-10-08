<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;

class TaskTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_task()
    {
        $response = $this->post('/tasks',[
            'title'=>'New Task',
            'description'=>'New Description',
        ]);
        $response->assertStatus(201);
        $this->assertDatabaseHas('tasks',['title'=>'New Task']);
    }

    public function test_read_task(){
        $task = Task::create([
            'title' => 'Existing Task',
            'description' => 'Task Description'
        ]);

        $response = $this->get('/tasks/' . $task->id);
        $response->assertStatus(200);
        $response->assertSee('Existing Task');
    }

    public function test_update_task()
    {
        $task = Task::create([
            'title' => 'Old Task',
            'description' => 'Old Description'
        ]);

        $response = $this->put('/tasks/' . $task->id, [
            'title' => 'Updated Task',
            'description' => 'Updated Description'
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('tasks', ['title' => 'Updated Task']);
    }

    public function test_delete_task()
    {
        $task = Task::create([
            'title' => 'Task to be deleted',
            'description' => 'This task will be deleted'
        ]);

        $response = $this->delete('/tasks/' . $task->id);
        $response->assertStatus(204);

        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}
