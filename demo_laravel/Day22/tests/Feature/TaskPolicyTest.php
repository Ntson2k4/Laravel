<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;
use App\Models\User;
use App\Policies\TaskPolicy;

class TaskPolicyTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    protected $policy;

    protected function setUp(): void
    {
        parent::setUp();
        $this->policy = new TaskPolicy();
    }

    public function test_user_can_create_task()
    {
        $user = User::factory()->create([
            'role' => 'user'
        ]);
    
        $this->policy = app(TaskPolicy::class);
    
        $this->assertTrue($this->policy->create($user));
    }
    

    public function test_user_can_update_task()
    {
        $user = User::factory()->create([
            'role' => 'user'
        ]);
    
        $task = Task::factory()->create(['user_id' => $user->id]);

        $this->assertTrue($this->policy->update($user, $task));
    }

    public function test_user_can_not_delete_task()
    {
        $user = User::factory()->create([
            'role' => 'user'
        ]);
        $task = Task::factory()->create(['user_id' => $user->id]);

        $this->assertFalse($this->policy->delete($user, $task));
    }

    public function test_user_can_not_view_task()
    {
        $user = User::factory()->create([
            'role' => 'user'
        ]);
        $task = Task::factory()->create(['user_id' => $user->id]);

        $this->assertTrue($this->policy->view($user, $task));
    }

    public function test_user_can_view_any_task()
    {
        $user = User::factory()->create([
            'role' => 'user'
        ]);

        $this->assertTrue($this->policy->viewAny($user));
    }
}
