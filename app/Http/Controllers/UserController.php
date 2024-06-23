<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // Mengambil semua user dengan hanya id dan name
        $users = User::select('id', 'name')->get();
        return response()->json($users);
    }
}
