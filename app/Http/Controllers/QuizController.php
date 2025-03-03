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
            'questions.*.options.*.is_correct' => 'required|boolean',
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
            'questions.*.options.*.is_correct' => 'required|boolean',
        ]);
    
        $quiz->update($request->only('title', 'description', 'time_limit'));
    
        foreach ($request->questions as $questionData) {
            $question = $quiz->questions()->updateOrCreate(
                ['id' => $questionData['id'] ?? null], 
                ['question_text' => $questionData['question_text']]
            );
    
            if (isset($questionData['options'])) {
                foreach ($questionData['options'] as $optionData) {
                    $question->options()->updateOrCreate(
                        ['id' => $optionData['id'] ?? null], 
                        ['option_text' => $optionData['option_text'], 'is_correct' => $optionData['is_correct']]
                    );
                }
            }
        }
    
        return redirect()->route('admin.quizzes.index')->with('success', 'Quiz updated successfully.');
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();

        return redirect()->route('admin.quizzes.index')->with('success', 'Quiz deleted successfully.');
    }

    public function start(Request $request)
    {
        $quiz = Quiz::with('questions.options')->first();

        if (!$quiz) {
            return redirect()->route('candidate.profile')->with('error', 'No quiz available at this time.');
        }

        return view('candidate.quiz', [
            'quiz' => $quiz,
        ]);
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'quiz_id' => 'required|exists:quizzes,id',
            'answers' => 'required|array',
            'answers.*' => 'exists:options,id',
        ]);
    
        $quiz = Quiz::find($validated['quiz_id']);
        $score = 0;
        $total = $quiz->questions->count();
    
        foreach ($quiz->questions as $question) {
            $selectedOptionId = $validated['answers'][$question->id] ?? null;
            $correctOption = $question->options->firstWhere('is_correct', true);
            
            if ($selectedOptionId && $correctOption && $selectedOptionId == $correctOption->id) {
                $score++;
            }
        }
    
        return redirect()->route('candidate.profile')->with('success', "Quiz completed! Score: $score/$total");
    }
}