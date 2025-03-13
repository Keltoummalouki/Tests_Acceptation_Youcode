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