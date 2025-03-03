@extends('layouts.layout')

@section('title', 'Take Quiz')

@section('content')
<div class="py-12 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-extrabold text-gray-900">
                {{ $quiz->title }}
            </h1>
            <p class="mt-2 text-lg text-gray-500">
                Time Limit: {{ $quiz->time_limit }} minutes | {{ $quiz->questions->count() }} Questions
            </p>
            <p class="mt-2 text-lg text-red-500" id="timer">
                Time Remaining: {{ $quiz->time_limit }}:00
            </p>
        </div>

        <!-- Quiz Form -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <form id="quizForm" action="{{ route('candidate.quiz.submit') }}" method="POST">
                @csrf
                <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">

                <!-- Questions -->
                <div class="space-y-8">
                    @foreach($quiz->questions as $index => $question)
                        <div class="border-b border-gray-200 pb-6 last:border-b-0">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">
                                Question {{ $index + 1 }}: {{ $question->question_text }}
                            </h3>
                            <div class="space-y-4">
                                @foreach($question->options as $option)
                                    <div class="flex items-center">
                                        <input type="radio" 
                                               name="answers[{{ $question->id }}]" 
                                               id="option_{{ $option->id }}" 
                                               value="{{ $option->id }}"
                                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300"
                                               required>
                                        <label for="option_{{ $option->id }}" 
                                               class="ml-3 block text-sm text-gray-700">
                                            {{ $option->option_text }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            @error("answers.{$question->id}")
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    @endforeach
                </div>

                <!-- Submit Button -->
                <div class="mt-8 flex justify-end">
                    <button type="submit" 
                            class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Submit Quiz
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        let timeLimit = {{ $quiz->time_limit }} * 60; // Convert minutes to seconds
        let timerElement = document.getElementById('timer');
        let quizForm = document.getElementById('quizForm');

        function startTimer(duration, display) {
            let timer = duration, minutes, seconds;
            let interval = setInterval(() => {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = `Time Remaining: ${minutes}:${seconds}`;

                if (--timer < 0) {
                    clearInterval(interval);
                    alert("Time's up!");
                    quizForm.submit();
                }
            }, 1000);
        }

        startTimer(timeLimit, timerElement);
    });
</script>
@endsection