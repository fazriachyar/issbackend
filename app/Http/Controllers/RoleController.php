<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function store(Request $request)
    {
        // Hanya admin yang bisa menambahkan role baru
        $this->authorize('isAdmin');

        $role = Role::create($request->only('name'));
        return response()->json($role, 201);
    }

    public function assignRole(Request $request, $userId)
    {
        // Hanya admin yang bisa mengassign role
        $this->authorize('isAdmin');

        $user = User::findOrFail($userId);
        $role = Role::where('name', $request->input('role'))->firstOrFail();
        $user->roles()->attach($role);
        return response()->json(['message' => 'Role assigned successfully!'], 200);
    }
}
