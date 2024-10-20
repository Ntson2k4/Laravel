<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
        $users= User::all();
        return view('users.index', compact('users'));
    }

    public function create(){
        return view('users.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);
    
        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = bcrypt($validated['password']); 
        $user->save();
    
        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    public function edit($id){
        $user=User::find($id);
        return view('users.edit',compact('user'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
        ]);
    
        $user = User::findOrFail($id);
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        if (!empty($validated['password'])) {
            $user->password = bcrypt($validated['password']);
        }
        $user->save();
    
        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    public function destroy($id){
        $user=User::find($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
