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

    public function edit($id){
        $task=Task::find($id);
        return view('tasks.edit',compact('task'));
    }

    public function update(Request $request, $id){
        $validateData=$request->validate([
            'name'=>'required|string|max:255',
            'description'=>'nullable|string',
        ]);
        $task=Task::find($id);
        $task->update($validateData);
        event(new TaskCreated($task,'Task updated successfully'));
        return redirect()->route('tasks.index')->with('success','Task updated successfully!');
    }

    public function destroy($id){
        $task=Task::find($id);
        $task->delete();
        event(new TaskCreated($task,'Task deleted successfully!'));
        return redirect()->route('tasks.index')->with('success','Task deleted successfully!');  
    }
}
