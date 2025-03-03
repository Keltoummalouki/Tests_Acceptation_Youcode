@extends('layouts.layout')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Create Quiz</h1>
    <form action="{{ route('admin.quizzes.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
            <input type="text" name="title" id="title" class="form-input mt-1 block w-full bg-gray-100 bg-opacity-75" required>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
            <textarea name="description" id="description" class="form-textarea mt-1 block w-full bg-gray-100 bg-opacity-75"></textarea>
        </div>
        <div class="mb-4">
            <label for="time_limit" class="block text-gray-700 font-bold mb-2">Time Limit (minutes)</label>
            <input type="number" name="time_limit" id="time_limit" class="form-input mt-1 block w-full bg-gray-100 bg-opacity-75" required>
        </div>
        <div id="questions-container" class="mb-6">
            <h3 class="text-xl font-semibold mb-4">Questions</h3>
            <div class="question mb-4 p-4 border rounded-lg bg-gray-50 bg-opacity-75">
                <div class="mb-4">
                    <label for="questions[0][question_text]" class="block text-gray-700 font-bold mb-2">Question Text</label>
                    <input type="text" name="questions[0][question_text]" class="form-input mt-1 block w-full bg-gray-100 bg-opacity-75" required>
                </div>
                <div class="options-container mb-4">
                    <h4 class="text-lg font-semibold mb-2">Options</h4>
                    <div class="option mb-2">
                        <label for="questions[0][options][0][option_text]" class="block text-gray-700 font-bold mb-2">Option Text</label>
                        <input type="text" name="questions[0][options][0][option_text]" class="form-input mt-1 block w-full bg-gray-100 bg-opacity-75" required>
                        <label for="questions[0][options][0][is_correct]" class="inline-flex items-center mt-2">
                            <input type="checkbox" name="questions[0][options][0][is_correct]" value="1" class="form-checkbox">
                            <span class="ml-2">Is Correct</span>
                        </label>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary add-option bg-blue-500 bg-opacity-75 text-white px-4 py-2 rounded-md hover:bg-blue-600">Add Option</button>
            </div>
        </div>
        <button type="button" class="btn btn-secondary add-question bg-blue-500 bg-opacity-75 text-white px-4 py-2 rounded-md hover:bg-blue-600 mb-4">Add Question</button>
        <button type="submit" class="btn btn-primary bg-green-500 bg-opacity-75 text-white px-4 py-2 rounded-md hover:bg-green-600">Create Quiz</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let questionIndex = 1;
        let optionIndex = 1;

        document.querySelector('.add-question').addEventListener('click', function () {
            const questionTemplate = `
                <div class="question mb-4 p-4 border rounded-lg bg-gray-50 bg-opacity-75">
                    <div class="mb-4">
                        <label for="questions[${questionIndex}][question_text]" class="block text-gray-700 font-bold mb-2">Question Text</label>
                        <input type="text" name="questions[${questionIndex}][question_text]" class="form-input mt-1 block w-full bg-gray-100 bg-opacity-75" required>
                    </div>
                    <div class="options-container mb-4">
                        <h4 class="text-lg font-semibold mb-2">Options</h4>
                        <div class="option mb-2">
                            <label for="questions[${questionIndex}][options][0][option_text]" class="block text-gray-700 font-bold mb-2">Option Text</label>
                            <input type="text" name="questions[${questionIndex}][options][0][option_text]" class="form-input mt-1 block w-full bg-gray-100 bg-opacity-75" required>
                            <label for="questions[${questionIndex}][options][0][is_correct]" class="inline-flex items-center mt-2">
                                <input type="checkbox" name="questions[${questionIndex}][options][0][is_correct]" value="1" class="form-checkbox">
                                <span class="ml-2">Is Correct</span>
                            </label>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary add-option bg-blue-500 bg-opacity-75 text-white px-4 py-2 rounded-md hover:bg-blue-600">Add Option</button>
                </div>
            `;
            document.getElementById('questions-container').insertAdjacentHTML('beforeend', questionTemplate);
            questionIndex++;
        });

        document.getElementById('questions-container').addEventListener('click', function (e) {
            if (e.target.classList.contains('add-option')) {
                const optionsContainer = e.target.previousElementSibling;
                const questionIndex = optionsContainer.querySelector('input').name.match(/\d+/)[0];
                const optionTemplate = `
                    <div class="option mb-2">
                        <label for="questions[${questionIndex}][options][${optionIndex}][option_text]" class="block text-gray-700 font-bold mb-2">Option Text</label>
                        <input type="text" name="questions[${questionIndex}][options][${optionIndex}][option_text]" class="form-input mt-1 block w-full bg-gray-100 bg-opacity-75" required>
                        <label for="questions[${questionIndex}][options][${optionIndex}][is_correct]" class="inline-flex items-center mt-2">
                            <input type="checkbox" name="questions[${questionIndex}][options][${optionIndex}][is_correct]" value="1" class="form-checkbox">
                            <span class="ml-2">Is Correct</span>
                        </label>
                    </div>
                `;
                optionsContainer.insertAdjacentHTML('beforeend', optionTemplate);
                optionIndex++;
            }
        });
    });
</script>
@endsection