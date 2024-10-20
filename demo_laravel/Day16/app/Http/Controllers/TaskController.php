<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function index(){
        $tasks=Task::all();
        return view('tasks.index',compact('tasks'));
    }
    
    public function create(){
         return view('tasks.create');
     }
 
     
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
        ]);

        $task = new Task();
        $task->title = $validated['title'];
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }
 
    
    public function edit($id){
         $task = Task::findOrFail($id);
         return view('tasks.edit', compact('task'));
     }
 
    
     public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
        ]);

        $task = Task::findOrFail($id);
        $task->title = $validated['title'];
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }
 
    
    public function destroy($id){
         $task = Task::findOrFail($id);
         $task->delete();
 
         return redirect()->route('tasks.index');
     }
}
