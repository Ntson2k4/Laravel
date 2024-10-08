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
        $task=new Task;
        $task->title=$request->title;
        $task->description =$request->description ;
        $task->completed=$request->completed;

        $task->save();
        return redirect('/tasks');
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
    public function update(Request $request,$id){
        $task=Task::find($id);
        $task->title=$request->title;
        $task->description =$request->description ;
        $task->completed=$request->completed;

        $task->save();
        return redirect('/tasks');
    }
}