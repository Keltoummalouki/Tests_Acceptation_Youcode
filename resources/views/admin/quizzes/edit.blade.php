@extends('layouts.layout')

@section('title', 'Edit Quiz')

@section('content')
<div class="py-12 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-sm p-6">
            <!-- Header -->
            <h1 class="text-3xl font-extrabold text-gray-900 mb-8">Edit Quiz: {{ $quiz->title }}</h1>

            <!-- Quiz Form -->
            <form action="{{ route('admin.quizzes.update', $quiz->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Quiz Title</label>
                    <input type="text" 
                           name="title" 
                           id="title" 
                           value="{{ old('title', $quiz->title) }}"
                           class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('title') border-red-300 @enderror"
                           required>
                    @error('title')
                        <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" 
                              id="description" 
                              rows="3"
                              class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('description') border-red-300 @enderror">{{ old('description', $quiz->description) }}</textarea>
                    @error('description')
                        <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Time Limit -->
                <div>
                    <label for="time_limit" class="block text-sm font-medium text-gray-700">Time Limit (minutes)</label>
                    <input type="number" 
                           name="time_limit" 
                           id="time_limit" 
                           value="{{ old('time_limit', $quiz->time_limit) }}"
                           class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('time_limit') border-red-300 @enderror"
                           min="1"
                           required>
                    @error('time_limit')
                        <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Questions Container -->
                <div id="questions-container" class="space-y-6">
                    <h3 class="text-xl font-semibold text-gray-800">Questions</h3>
                    @foreach($quiz->questions as $questionIndex => $question)
                        <div class="question p-6 border border-gray-200 rounded-lg bg-gray-50">
                            <div class="mb-4">
                                <label for="questions[{{ $questionIndex }}][question_text]" class="block text-sm font-medium text-gray-700">Question Text</label>
                                <input type="text" 
                                       name="questions[{{ $questionIndex }}][question_text]" 
                                       class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                       value="{{ old("questions.$questionIndex.question_text", $question->question_text) }}"
                                       required>
                            </div>
                            <div class="options-container space-y-4">
                                <h4 class="text-lg font-medium text-gray-800">Options</h4>
                                @foreach($question->options as $optionIndex => $option)
                                    <div class="option">
                                        <label for="questions[{{ $questionIndex }}][options][{{ $optionIndex }}][option_text]" class="block text-sm font-medium text-gray-700">Option Text</label>
                                        <input type="text" 
                                               name="questions[{{ $questionIndex }}][options][{{ $optionIndex }}][option_text]" 
                                               class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                               value="{{ old("questions.$questionIndex.options.$optionIndex.option_text", $option->option_text) }}"
                                               required>
                                        <label for="questions[{{ $questionIndex }}][options][{{ $optionIndex }}][is_correct]" class="inline-flex items-center mt-2">
                                            <input type="checkbox" 
                                                   name="questions[{{ $questionIndex }}][options][{{ $optionIndex }}][is_correct]" 
                                                   value="1" 
                                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                                                   {{ old("questions.$questionIndex.options.$optionIndex.is_correct", $option->is_correct) ? 'checked' : '' }}>
                                            <span class="ml-2 text-sm text-gray-700">Is Correct</span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" 
                                    class="add-option mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Add Option
                            </button>
                        </div>
                    @endforeach
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 pt-6">
                    <button type="button" 
                            class="add-question w-full sm:w-auto inline-flex justify-center items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Add Question
                    </button>
                    <button type="submit" 
                            class="w-full sm:w-auto inline-flex justify-center items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Update Quiz
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let questionIndex = {{ $quiz->questions->count() }};
        let optionIndices = {};

        // Initialize option indices for existing questions
        @foreach($quiz->questions as $questionIndex => $question)
            optionIndices[{{ $questionIndex }}] = {{ $question->options->count() }};
        @endforeach

        // Add Question
        document.querySelector('.add-question').addEventListener('click', function () {
            optionIndices[questionIndex] = 0;
            const questionTemplate = `
                <div class="question p-6 border border-gray-200 rounded-lg bg-gray-50">
                    <div class="mb-4">
                        <label for="questions[${questionIndex}][question_text]" class="block text-sm font-medium text-gray-700">Question Text</label>
                        <input type="text" 
                               name="questions[${questionIndex}][question_text]" 
                               class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                               required>
                    </div>
                    <div class="options-container space-y-4">
                        <h4 class="text-lg font-medium text-gray-800">Options</h4>
                        <div class="option">
                            <label for="questions[${questionIndex}][options][0][option_text]" class="block text-sm font-medium text-gray-700">Option Text</label>
                            <input type="text" 
                                   name="questions[${questionIndex}][options][0][option_text]" 
                                   class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                   required>
                            <label for="questions[${questionIndex}][options][0][is_correct]" class="inline-flex items-center mt-2">
                                <input type="checkbox" 
                                       name="questions[${questionIndex}][options][0][is_correct]" 
                                       value="1" 
                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                <span class="ml-2 text-sm text-gray-700">Is Correct</span>
                            </label>
                        </div>
                    </div>
                    <button type="button" 
                            class="add-option mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Add Option
                    </button>
                </div>
            `;
            document.getElementById('questions-container').insertAdjacentHTML('beforeend', questionTemplate);
            questionIndex++;
        });

        // Add Option
        document.getElementById('questions-container').addEventListener('click', function (e) {
            if (e.target.classList.contains('add-option')) {
                const optionsContainer = e.target.previousElementSibling;
                const questionIndex = optionsContainer.querySelector('input').name.match(/\d+/)[0];
                const optionIndex = optionIndices[questionIndex] || 0;
                optionIndices[questionIndex] = optionIndex + 1;

                const optionTemplate = `
                    <div class="option">
                        <label for="questions[${questionIndex}][options][${optionIndex}][option_text]" class="block text-sm font-medium text-gray-700">Option Text</label>
                        <input type="text" 
                               name="questions[${questionIndex}][options][${optionIndex}][option_text]" 
                               class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                               required>
                        <label for="questions[${questionIndex}][options][${optionIndex}][is_correct]" class="inline-flex items-center mt-2">
                            <input type="checkbox" 
                                   name="questions[${questionIndex}][options][${optionIndex}][is_correct]" 
                                   value="1" 
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <span class="ml-2 text-sm text-gray-700">Is Correct</span>
                        </label>
                    </div>
                `;
                optionsContainer.insertAdjacentHTML('beforeend', optionTemplate);
            }
        });
    });
</script>
@endsection