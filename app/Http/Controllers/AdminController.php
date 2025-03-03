<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Quiz;
use App\Models\Role;

class AdminController extends Controller
{

    public function dashboard()
    {
        $users = User::all();
        $quizzes = Quiz::all();

        $totalUsers = User::count();
        $totalRoles = Role::count();
        $newUsersThisMonth = User::whereMonth('created_at', now()->month)->count();
        $totalQuizzes = Quiz::count();

        return view('admin.dashboard', compact('users', 'quizzes','totalUsers', 'totalRoles', 'newUsersThisMonth', 'totalQuizzes'));
    }

    public function candidate()
    {
        $candidates = User::where('role_id', 2)->with('candidateInfo')->get();
        $totalUsers = User::count();
        $totalRoles = Role::count();
        $newUsersThisMonth = User::whereMonth('created_at', now()->month)->count();
        $totalQuizzes = Quiz::count();

        return view('admin.users.candidate', compact('candidates', 'totalUsers', 'totalRoles', 'newUsersThisMonth', 'totalQuizzes'));
    }
}