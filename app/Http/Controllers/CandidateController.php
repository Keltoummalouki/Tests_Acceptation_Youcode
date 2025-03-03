<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CandidateInfo;

class CandidateController extends Controller
{
    public function showProfile()
    {
        return view('candidate.profile');
    }

    public function storeProfile(Request $request)
    {
        $validated = $request->validate([
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'document_type' => 'required|in:cin,passport',
            'document_path' => 'required|file|mimes:pdf,jpg,png|max:2048',
        ]);

        $path = $request->file('document_path')->store('documents', 'public');

        CandidateInfo::updateOrCreate(
            ['user_id' => auth()->id()],
            [
                'phone' => $validated['phone'],
                'address' => $validated['address'],
                'city' => $validated['city'],
                'date_of_birth' => $validated['date_of_birth'],
                'document_type' => $validated['document_type'],
                'document_path' => $path,
            ]
        );

        return redirect()->route('candidate.quiz.start')->with('success', 'Profile completed successfully!');
    }
}