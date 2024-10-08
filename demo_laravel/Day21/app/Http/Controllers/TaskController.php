<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\TaskCreated;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(){
        $tasks=Task::all();
        return view('tasks.index',compact('tasks'));
    }

    public function create(){
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
    
        $task = Task::create($validatedData);
        event(new TaskCreated($task, 'Task created successfully!'));
    
        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

}
