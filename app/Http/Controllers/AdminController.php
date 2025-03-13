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
        $totalUsers = User::count();
        $totalRoles = Role::count();
        $newUsersThisMonth = User::whereMonth('created_at', now()->month)->count();
        $totalQuizzes = Quiz::count();

        $users = User::with('role')->latest()->paginate(5);
        $quizzes = Quiz::latest()->paginate(5);

        return view('admin.dashboard', compact('users', 'quizzes','totalUsers', 'totalRoles', 'newUsersThisMonth', 'totalQuizzes'));
    }

    public function candidate()
    {
        $candidates = User::where('role_id', 2)->with('candidateInfo')->get();
        $totalUsers = User::count();
        $totalRoles = Role::count();
        $newUsersThisMonth = User::whereMonth('created_at', now()->month)->count();
        $totalQuizzes = Quiz::count();
        $totalCandidates = $candidates->count();

        return view('admin.users.candidate', compact('candidates', 'totalUsers', 'totalRoles', 'newUsersThisMonth', 'totalQuizzes'));
    }

    public function index()
    {
        $totalUsers = User::count();
        $totalRoles = Role::count();
        $newUsersThisMonth = User::whereMonth('created_at', now()->month)->count();
        $totalQuizzes = Quiz::count();
        $staffs = User::where('role_id', 3)->get();
        return view('admin.users.staff.index', compact('staffs', 'totalUsers', 'totalRoles', 'newUsersThisMonth', 'totalQuizzes'));
    }

    public function create()
    {
        return view('admin.users.staff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => 3,
        ]);
    
        return redirect()->route('admin.staff')->with('success', 'Staff member created successfully.');
    }

    public function edit(User $staff)
    {
        return view('admin.users.staff.edit', compact('staff'));
    }

    public function update(Request $request, User $staff)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $staff->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $staff->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $staff->password,
        ]);

        return redirect()->route('admin.staff.index')->with('success', 'Staff member updated successfully.');
    }

    public function destroy(User $staff)
    {
        $staff->delete();
        return redirect()->route('admin.staff.index')->with('success', 'Staff member deleted successfully.');
    }
}