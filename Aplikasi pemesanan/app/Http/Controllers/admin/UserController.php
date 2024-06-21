<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('admin.user');
    }

    public function showUsers() {
        $users = User::where('role', 'customer')->get();
        return view('admin.user', compact('users'));
    }
}
