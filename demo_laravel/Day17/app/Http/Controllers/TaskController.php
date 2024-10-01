<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // hien thi va loc
    public function index(Request $request)
    {
        $title = $request->input('title');
        $completed = $request->input('completed');

        $query = Task::query();
    
        if ($title) {
            $query->where('title', 'like', '%' . $title . '%');
        }
    
        if ($completed !== null) {
            $query->where('completed', $completed);
        }
    
        $tasks = $query->get();
        return view('tasks.index', ['tasks' => $tasks]);

    }
    //b2
    // Tạo bản ghi mới
    public function store1(Request $request)
    {
        $task = Task::create($request->only(['title', 'description', 'completed']));
    }

    // Cập nhật bản ghi
    public function update1(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->only(['title', 'description', 'completed']));
    }

    // Xóa bản ghi
    public function delete1($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
    }
    //b5
    public function create(){
        return view('tasks.create');
    }
    public function store(Request $request){
        $task=new Task();
        $task->title=$request->input('title');
        $task->description=$request->input('description');
        $task->completed=$request->input('completed');
        $task->project_id=$request->input('project_id');
        $task->save();
        return redirect()->route('tasks.index');
    }
    public function edit($id)
    {
        $task = Task::find($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::find($id);
        $project->title = $request->input('title');
        $project->description = $request->input('description');
        $task->completed=$request->input('completed');
        $task->project_id=$request->input('project_id');
        $project->save();
        return redirect()->route('tasks.index');
    }

    public function destroy($id){
        $task = Task::find($id);
        $task->delete();

        return redirect()->route('tasks.index');
    }
}
