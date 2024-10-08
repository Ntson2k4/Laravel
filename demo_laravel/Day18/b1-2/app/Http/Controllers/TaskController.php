<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function index(){
        $tasks=Task::all();
        return view('tasks.index',compact('tasks'));
    }

    public function store(StoreTaskRequest $request){
        Task::create($request->validated());
        return redirect()->route('tasks.index')->with('success','Thêm nhiệm vụ thành công');
    }
}
