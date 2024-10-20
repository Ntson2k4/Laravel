<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
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
    
    // Lấy tất cả nhiệm vụ
    $tasks = $query->get();

    // Lấy tất cả dự án
    $projects = Project::all(); // Đảm bảo rằng bạn lấy danh sách dự án

    // Truyền danh sách nhiệm vụ và dự án vào view
    return view('tasks.index', [
        'tasks' => $tasks,
        'projects' => $projects // Truyền biến projects vào view
    ]);
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
    public function create()
    {
    $projects = Project::all();
    return view('tasks.create', compact('projects'));
    }


    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'string',
            'completed' => 'boolean',
            'project_id' => 'required|exists:projects,id', 
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $task = new Task();
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->completed = $request->input('completed', 0);
        $task->project_id = $request->input('project_id');
        $task->save();
    
        return redirect()->route('tasks.index');
    }

    public function edit($id)
    {
    $task = Task::findOrFail($id);
    $projects = Project::all(); 
    return view('tasks.edit', compact('task', 'projects'));
    }

    public function update(Request $request, $id)
    {
    $task = Task::findOrFail($id);

    $validator = Validator::make($request->all(), [
        'title' => 'required|string|max:255',
        'description' => 'string',
        'completed' => 'boolean',
        'project_id' => 'required|exists:projects,id',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $task->update($request->only(['title', 'description', 'completed', 'project_id']));

    return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }


    public function destroy($id){
        $task = Task::find($id);
        $task->delete();

        return redirect()->route('tasks.index');
    }
}
