<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Option;
use App\Models\User;
use App\Models\Role;
use App\Models\QuizResult;
use Illuminate\Pagination\Paginator;
use App\Http\Controllers\Illuminate\Database\Eloquent\Collection;
use App\Models\QuizResponse;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalRoles = Role::count();
        $newUsersThisMonth = User::whereMonth('created_at', now()->month)->count();
        $totalQuizzes = Quiz::count();
        $quizzes = Quiz::all()->paginate(3);
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

    public function show(Quiz $quiz , $id)
    {
        $quiz = Quiz::find($id);
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
    
        return redirect()->route('admin.quizzes.index')->with('success', 'Quiz updated successfully.');    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();

        return redirect()->route('admin.quizzes.index')->with('success', 'Quiz deleted successfully.');
    }

    public function start(Request $request)
    {
        $quiz = Quiz::with('questions.options')->first();

        if (!$quiz) {
            return redirect()->route('candidate.profile')->with('error', 'No quiz available.');
        }

        $hasTakenQuiz = QuizResult::where('user_id', Auth::id())
                                ->where('quiz_id', $quiz->id)
                                ->exists();

        if ($hasTakenQuiz) {
            return redirect()->route('candidate.profile')->with('error', 'You have already completed this quiz.');
        }

        $questions = $quiz->questions()->with(['userResponse' => function ($query) {
            $query->where('user_id', Auth::id());
        }])->paginate(3);

        return view('candidate.quiz', compact('quiz', 'questions'));
    }

    public function navigate(Request $request)
    {
        $validated = $request->validate([
            'quiz_id' => 'required|exists:quizzes,id',
            'answers' => 'nullable|array',
            'answers.*' => 'exists:options,id',
            'page' => 'required|integer',
            'direction' => 'required|in:next,previous',
        ]);

        $quiz = Quiz::find($validated['quiz_id']);
        $userId = Auth::id();

        if ($request->has('answers')) {
            foreach ($request->input('answers') as $questionId => $optionId) {
                QuizResponse::updateOrCreate(
                    [
                        'user_id' => $userId,
                        'quiz_id' => $quiz->id,
                        'question_id' => $questionId,
                    ],
                    ['option_id' => $optionId]
                );
            }
        }

        $currentPage = $validated['page'];
        $newPage = $validated['direction'] === 'next' ? $currentPage + 1 : $currentPage - 1;

        return redirect()->route('quiz.start', ['page' => $newPage]);
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'quiz_id' => 'required|exists:quizzes,id',
            'answers' => 'required|array',
            'answers.*' => 'exists:options,id',
        ]);

        $quiz = Quiz::find($validated['quiz_id']);
        $userId = Auth::id();

        $hasTakenQuiz = QuizResult::where('user_id', $userId)
                                ->where('quiz_id', $quiz->id)
                                ->exists();

        if ($hasTakenQuiz) {
            return redirect()->route('candidate.profile')->with('error', 'You have already submitted this quiz.');
        }


        foreach ($request->input('answers') as $questionId => $optionId) {
            QuizResponse::updateOrCreate(
                [
                    'user_id' => $userId,
                    'quiz_id' => $quiz->id,
                    'question_id' => $questionId,
                ],
                ['option_id' => $optionId]
            );
        }

        $score = 0;
        $total = $quiz->questions->count();
        $responses = QuizResponse::where('user_id', $userId)
                                ->where('quiz_id', $quiz->id)
                                ->get();

        foreach ($quiz->questions as $question) {
            $response = $responses->firstWhere('question_id', $question->id);
            $correctOption = $question->options->firstWhere('is_correct', true);

            if ($response && $correctOption && $response->option_id == $correctOption->id) {
                $score++;
            }
        }

        QuizResult::create([
            'user_id' => $userId,
            'quiz_id' => $quiz->id,
            'score' => $score,
            'total' => $total,
        ]);

        QuizResponse::where('user_id', $userId)->where('quiz_id', $quiz->id)->delete();

        return redirect()->route('candidate.profile')->with('success', "Quiz completed! Score: $score/$total");
    }
}
