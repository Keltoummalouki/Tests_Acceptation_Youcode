<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Quiz;
use App\Models\TestSchedule;
use App\Models\StaffEvent;
use Illuminate\Support\Facades\Auth;



class StaffController extends Controller
{
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

    public function staffDashboard()
    {
        $staffId = Auth::id();

        $testSchedules = TestSchedule::where('staff_id', $staffId)
                                    ->with('candidateInfo.user')
                                    ->latest()
                                    ->paginate(5, ['*'], 'tests_page');

        $staffEvents = StaffEvent::where('staff_id', $staffId)
                                ->latest()
                                ->paginate(5, ['*'], 'events_page');

        $totalTests = TestSchedule::where('staff_id', $staffId)->count();
        $totalEvents = StaffEvent::where('staff_id', $staffId)->count();

        return view('staff.index', compact(
            'testSchedules',
            'staffEvents',
            'totalTests',
            'totalEvents'
        ));
    }


    public function updateEvent(Request $request, $eventId)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'time_start' => 'required|date',
            'time_end' => 'required|date|after:time_start',
        ]);

        $event = StaffEvent::where('staff_id', Auth::id())->findOrFail($eventId);
        $event->update($request->only(['title', 'description', 'time_start', 'time_end']));

        
        return redirect()->route('staff.index')->with('success', 'Event updated successfully!');
    }
}