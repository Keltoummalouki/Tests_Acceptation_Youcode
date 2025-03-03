<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Option;
use App\Models\User;
use App\Models\Role;

class QuizController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalRoles = Role::count();
        $newUsersThisMonth = User::whereMonth('created_at', now()->month)->count();
        $totalQuizzes = Quiz::count();
        $quizzes = Quiz::all();
        return view('admin.quizzes.index', compact('quizzes', 'totalUsers', 'totalRoles', 'newUsersThisMonth', 'totalQuizzes'));
    }

    public function create()
    {
        return view('admin.quizzes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'time_limit' => 'required|integer|min:1',
            'questions.*.question_text' => 'required|string',
            'questions.*.options.*.option_text' => 'required|string',
        ]);

        $quiz = Quiz::create($request->only('title', 'description', 'time_limit'));

        foreach ($request->questions as $questionData) {
            $question = $quiz->questions()->create(['question_text' => $questionData['question_text']]);
            foreach ($questionData['options'] as $optionData) {
                $question->options()->create($optionData);
            }
        }

        return redirect()->route('admin.quizzes.index')->with('success', 'Quiz created successfully.');
    }

    public function show(Quiz $quiz)
    {
        return view('admin.quizzes.show', compact('quiz'));
    }

    public function edit(Quiz $quiz)
    {
        return view('admin.quizzes.edit', compact('quiz'));
    }

    public function update(Request $request, Quiz $quiz)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'time_limit' => 'required|integer|min:1',
            'questions.*.question_text' => 'required|string',
            'questions.*.options.*.option_text' => 'required|string',
        ]);

        $quiz->update($request->only('title', 'description', 'time_limit'));

        foreach ($request->questions as $questionData) {
            $question = $quiz->questions()->updateOrCreate(['id' => $questionData['id']], ['question_text' => $questionData['question_text']]);
            foreach ($questionData['options'] as $optionData) {
                $question->options()->updateOrCreate(['id' => $optionData['id']], $optionData);
            }
        }

        return redirect()->route('admin.quizzes.index')->with('success', 'Quiz updated successfully.');
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();

        return redirect()->route('admin.quizzes.index')->with('success', 'Quiz deleted successfully.');
    }
}