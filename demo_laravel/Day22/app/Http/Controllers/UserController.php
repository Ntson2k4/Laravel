<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Thêm dòng này


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

      public function create()
      {
          return view('admin.users.create');
      }
  
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|string',
        ]);
        
        $validatedData['password'] = Hash::make($validatedData['password']);
        
        User::create($validatedData);
        
        return redirect()->route('admin.users')->with('success', 'Người dùng đã được tạo thành công.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {   
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'role' => 'required|string',
        ]);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        if (isset($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }
        $user->role = $validatedData['role'];
        $user->save();

        return redirect()->route('admin.users')->with('success', 'Sửa thành công người dùng.');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'Người dùng đã được xóa thành công.');
    }
}
