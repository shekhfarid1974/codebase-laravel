<?php
// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('view users');
        
        $users = User::with('roles')->get();
        $roles = Role::all();
        
        return view('users.index', compact('users', 'roles'));
    }

    public function create()
    {
        $this->authorize('create users');
        
        $roles = Role::whereNotIn('name', ['admin'])->get(); // Exclude admin role
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->authorize('create users');
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|exists:roles,name',
            'status' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->has('status') ? true : false,
        ]);

        $user->assignRole($request->role);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $this->authorize('edit users');
        
        $user = User::findOrFail($id);
        $roles = Role::whereNotIn('name', ['admin'])->get(); // Exclude admin role
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('edit users');
        
        $user = User::findOrFail($id);
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|exists:roles,name',
            'status' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->has('status') ? true : false,
        ]);

        if ($request->password) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        // Remove all roles and assign the new one
        $user->syncRoles([$request->role]);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $this->authorize('delete users');
        
        $user = User::findOrFail($id);
        
        // Don't allow deleting the admin user
        if ($user->hasRole('admin')) {
            return redirect()->route('users.index')->with('error', 'Cannot delete admin user.');
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    public function toggleStatus($id)
    {
        $this->authorize('edit users');
        
        $user = User::findOrFail($id);
        
        $user->update(['status' => !$user->status]);
        
        return response()->json(['status' => 'success', 'message' => 'User status updated']);
    }
}