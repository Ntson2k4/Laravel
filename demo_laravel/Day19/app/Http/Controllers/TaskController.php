<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
    if (!auth()->user()->can('viewAny', Task::class)) {
        return redirect()->route('dashboard')->with('error', 'Bạn không đủ quyền để xem danh sách task.');
    }

    $tasks = Task::all();
    return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        if (!auth()->user()->can('create', Task::class)) {
            return redirect()->back()->with('error', 'Bạn không đủ quyền để tạo task.');
        }
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        if (!auth()->user()->can('create', Task::class)) {
            return redirect()->back()->with('error', 'Bạn không đủ quyền để tạo task.');
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task = Task::create($validatedData);
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function edit(Task $task)
    {
        if (!auth()->user()->can('update', $task)) {
            return redirect()->back()->with('error', 'Bạn không đủ quyền để chỉnh sửa task.');
        }

        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        if (!auth()->user()->can('update', $task)) {
            return redirect()->back()->with('error', 'Bạn không đủ quyền để cập nhật task.');
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task->update($validatedData);
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        if (!auth()->user()->can('delete', $task)) {
            return redirect()->back()->with('error', 'Bạn không đủ quyền để xóa task.');
        }

        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
