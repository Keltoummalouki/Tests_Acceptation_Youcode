<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Option;
use Illuminate\Support\Facades\DB;

class QuizSeeder extends Seeder
{
    public function run()
    {
        DB::table('options')->truncate();
        DB::table('questions')->truncate();
        DB::table('quizzes')->truncate();

        $quiz = Quiz::create([
            'title' => 'Sample Quiz',
            'description' => 'This is a sample quiz for development purposes.',
            'time_limit' => 30,
        ]);

        $questions = [
            [
                'question_text' => 'What is the capital of France?',
                'options' => [
                    ['option_text' => 'Paris', 'is_correct' => true],
                    ['option_text' => 'London', 'is_correct' => false],
                    ['option_text' => 'Berlin', 'is_correct' => false],
                    ['option_text' => 'Madrid', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'What is 2 + 2?',
                'options' => [
                    ['option_text' => '3', 'is_correct' => false],
                    ['option_text' => '4', 'is_correct' => true],
                    ['option_text' => '5', 'is_correct' => false],
                    ['option_text' => '6', 'is_correct' => false],
                ],
            ],
        ];

        foreach ($questions as $questionData) {
            $question = $quiz->questions()->create(['question_text' => $questionData['question_text']]);
            foreach ($questionData['options'] as $optionData) {
                $question->options()->create($optionData);
            }
        }
    }
}
