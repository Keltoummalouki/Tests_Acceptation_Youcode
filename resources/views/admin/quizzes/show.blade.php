<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YoucodeTest - @yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .youcode-logo .you { color: #000; }
        .youcode-logo .code { color: #2563eb; }
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">
    <div class="flex flex-1 flex-col md:flex-row">
        <!-- Sidebar -->
        <aside class="bg-white shadow-lg w-full md:w-64 flex-shrink-0 md:sticky md:top-0 md:h-screen">
            <div class="p-4">
                <h1 class="youcode-logo text-2xl font-bold">
                    <span class="you">You</span><span class="code">Code</span>
                </h1>
            </div>
            <nav class="mt-2">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 {{ Route::is('admin.dashboard') ? 'bg-purple-500 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    DASHBOARD
                </a>
                <a href="{{ route('admin.candidate') }}" class="flex items-center px-4 py-3 {{ Route::is('admin.candidate') ? 'bg-purple-500 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Candidate
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Staff
                </a>
                <a href="{{ route('admin.quizzes.index') }}" class="flex items-center px-4 py-3 {{ Route::is('admin.quizzes.*') ? 'bg-purple-500 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Quizzes
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Staff Events
                </a>
            </nav>
            <div class="p-4">
                <button class="bg-purple-500 text-white w-full px-4 py-2 rounded-lg flex items-center hover:bg-purple-600 transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    CREATE ACCOUNT
                </button>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="container mx-auto px-4 py-8 max-w-4xl">
                <div class="bg-white rounded-lg shadow p-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-6">{{ $quiz->title }}</h1>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div>
                            <p class="text-gray-600"><strong class="text-gray-800">Description:</strong></p>
                            <p class="mt-1">{{ $quiz->description }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600"><strong class="text-gray-800">Time Limit:</strong></p>
                            <p class="mt-1">{{ $quiz->time_limit }} minutes</p>
                        </div>
                    </div>
            
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Questions</h3>
                    <div class="space-y-4">
                        @foreach($quiz->questions as $question)
                            <div class="p-4 border border-gray-200 rounded-lg bg-gray-50">
                                <p class="text-gray-700 mb-2"><strong>Question:</strong> {{ $question->question_text }}</p>
                                <h4 class="text-lg font-medium text-gray-800 mb-2">Options</h4>
                                <ul class="space-y-2">
                                    @foreach($question->options as $option)
                                        <li class="flex items-center">
                                            <span class="text-gray-600">{{ $option->option_text }}</span>
                                            @if($option->is_correct)
                                                <span class="ml-2 text-green-500 font-medium inline-flex items-center">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                    </svg>
                                                    (Correct)
                                                </span>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
            
                    <div class="mt-6">
                        <a href="{{ route('admin.quizzes.index') }}" 
                           class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">
                            Back to Quizzes
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-auto">
        <div class="max-w-7xl mx-auto py-12 px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact</h3>
                    <p class="text-gray-300 mb-2">Email: contact@youcode.ma</p>
                    <p class="text-gray-300 mb-2">Tél: +212 5XX XX XX XX</p>
                    <p class="text-gray-300">Youssoufia, Maroc</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Liens utiles</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white">À propos</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Formations</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Partenaires</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Suivez-nous</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-300 hover:text-white">
                            <i class="fab fa-linkedin text-2xl"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white">
                            <i class="fab fa-facebook text-2xl"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white">
                            <i class="fab fa-instagram text-2xl"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-gray-700 text-center">
                <p class="text-gray-300">© 2025 YouCode - Une initiative de la Fondation OCP</p>
            </div>
        </div>
    </footer>
</body>
</html>