<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

class TaskController extends Controller
{
    //hien thi
    public function index(){
        $getAll=DB::table('tasks')->select('*')->get();
        return view('tasks.index',compact('getAll'));
    }
    //form add
    public function create(){
        return view('tasks.task_create');
    }
    //add
    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|max:1000',
            'completed' => 'required|boolean',
        ]);
    
        $task = new Task;
        $task->title = $validated['title'];
        $task->description = $validated['description'];
        $task->completed = $validated['completed'];
    
        $task->save();
    
        return redirect('/tasks')->with('success', 'Task created successfully!');
    }
    //xoa
    public function destroy($id){
        $task=Task::find($id);
        $task->delete();
        return redirect('/tasks');
    }
    //lay id sang form update
    public function edit($id){
        $task= Task::findOrFail($id);
        return view('tasks.task_update',compact('task'));
    }
    //sua
    public function update(Request $request, $id){
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|max:1000',
            'completed' => 'required|boolean',
        ]);
    
        $task = Task::find($id);
        $task->title = $validated['title'];
        $task->description = $validated['description'];
        $task->completed = $validated['completed'];
    
        $task->save();
    
        return redirect('/tasks')->with('success', 'Task updated successfully!');
    }
}