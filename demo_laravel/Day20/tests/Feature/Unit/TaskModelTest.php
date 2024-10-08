<?php

namespace Tests\Feature\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;

class TaskModelTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    //b5
    use RefreshDatabase;

    public function test_task_can_be_created()
    {
        $task = Task::create([
            'title' => 'Sample Task',
            'description' => 'Sample Description'
        ]);

        $this->assertEquals('Sample Task', $task->title);
    }

    public function test_task_can_be_updated()
    {
        $task = Task::create(['title' => 'Old Task']);
        $task->update(['title' => 'Updated Task']);

        $this->assertEquals('Updated Task', $task->title);
    }
}
