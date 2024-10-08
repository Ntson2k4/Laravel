<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Task;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    public function create(User $user)
    {
        return $user->isAdmin() || $user->isEditor();
    }

    public function update(User $user, Task $task)
    {
        return $user->isAdmin();
    }

    public function delete(User $user, Task $task)
    {
        return $user->isAdmin();
    }

    public function view(User $user, Task $task)
    {
        //return $user->role === 'admin' || $user->id === $task->user_id; 
        return $user->isAdmin() || $user->isEditor();
    }

    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->isEditor();
    }
}
