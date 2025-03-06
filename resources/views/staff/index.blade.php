<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouCode - Staff Dashboard</title>
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
            <nav class="mt-2 flex-1 flex flex-col">
                <a href="{{ route('staff.index') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    DASHBOARD
                </a>
                <a href="{{ route('admin.candidate') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Candidate
                </a>
                <a href="#" class="flex items-center px-4 py-3 bg-purple-500 text-white hover:bg-purple-600">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Scheduled Tests
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    My Events
                </a>
                <div class="mt-auto p-4">
                    <form action="{{ route('logout') }}" method="POST" class="w-full">
                        @csrf
                        <button type="submit" 
                                class="flex items-center w-full px-4 py-3 bg-red-600 text-white hover:bg-red-700 rounded-md transition">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="py-12 bg-gray-50">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <!-- Header -->
                    <div class="flex flex-col sm:flex-row justify-between items-center mb-8">
                        <h2 class="text-3xl font-extrabold text-gray-900">Staff Dashboard</h2>
                    </div>

                    <!-- Stats Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                            <div class="flex items-center">
                                <div class="bg-cyan-100 p-3 rounded-full mr-4">
                                    <svg class="w-6 h-6 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2a2 2 0 01-2-2v-6a2 2 0 012-2zM3 8h2a2 2 0 012 2v6a2 2 0 01-2 2H3a2 2 0 01-2-2v-6a2 2 0 012-2zm6-2h6"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-gray-600 text-sm font-medium">Total Tests Assigned</p>
                                    <p class="text-2xl font-bold text-gray-900">{{ $totalTests }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                            <div class="flex items-center">
                                <div class="bg-green-100 p-3 rounded-full mr-4">
                                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3v5h6v-5c0-1.657-1.343-3-3-3z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-gray-600 text-sm font-medium">Total Events</p>
                                    <p class="text-2xl font-bold text-gray-900">{{ $totalEvents }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- Placeholder Stats to Match Admin’s 4-Column Layout -->
                        <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                            <div class="flex items-center">
                                <div class="bg-blue-100 p-3 rounded-full mr-4">
                                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18v18H3V3z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-gray-600 text-sm font-medium">Upcoming Tests</p>
                                    <p class="text-2xl font-bold text-gray-900">{{ $totalTests }}</p> <!-- Replace with actual data -->
                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                            <div class="flex items-center">
                                <div class="bg-orange-100 p-3 rounded-full mr-4">
                                    <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-gray-600 text-sm font-medium">Pending Reviews</p>
                                    <p class="text-2xl font-bold text-gray-900">0</p> <!-- Replace with actual data -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Test Schedules Table -->
                    <div class="bg-white rounded-lg shadow-sm overflow-x-auto mb-8">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Scheduled Tests</h3>
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Candidate Name</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Test Type</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Test Date</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @forelse($testSchedules as $schedule)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $schedule->candidateInfo?->user->name ?? 'N/A' }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ ucfirst($schedule->test_type) }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $schedule->test_date ? $schedule->test_date->format('d/m/Y H:i') : 'N/A' }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $schedule->location ?? 'N/A' }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <a href="{{ route('candidate.profile.view', $schedule->candidateInfo?->user->id ?? 0) }}" 
                                                   class="text-blue-600 hover:underline">View Profile</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">No tests scheduled</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="mt-4">
                                {{ $testSchedules->links() }}
                            </div>
                        </div>
                    </div>

                    <!-- Staff Events Table -->
                    <div class="bg-white rounded-lg shadow-sm overflow-x-auto">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">My Events</h3>
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Start Time</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">End Time</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @forelse($staffEvents as $event)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                <form action="{{ route('admin.staff.event.update', $event->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="text" name="title" value="{{ old('title', $event->title) }}" 
                                                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-sm">
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-500">
                                                <textarea name="description" 
                                                          class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-sm" 
                                                          rows="2">{{ old('description', $event->description) }}</textarea>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <input type="datetime-local" name="time_start" 
                                                       value="{{ old('time_start', $event->time_start->format('Y-m-d\TH:i')) }}" 
                                                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-sm">
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <input type="datetime-local" name="time_end" 
                                                       value="{{ old('time_end', $event->time_end->format('Y-m-d\TH:i')) }}" 
                                                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-sm">
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    <button type="submit" 
                                                            class="inline-flex items-center px-3 py-1 bg-blue-600 text-white text-sm rounded-md hover:bg-blue-700">
                                                        Update
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">No events scheduled</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="mt-4">
                                {{ $staffEvents->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-auto">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
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