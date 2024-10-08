<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Task;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    //b4
    public function view(User $user,Task $Task){
        return $user->is_admin;
    }

    public function create(User $user){
        return $user->is_admin;
    }

    public function update(User $user, Task $task)
    {
        return $user->is_admin;
    }

    public function delete(User $user, Task $task)
    {
        return $user->is_admin;
    }
}
