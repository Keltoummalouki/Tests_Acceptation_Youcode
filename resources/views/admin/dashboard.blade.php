<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YoucodeTest Dashboard</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Font Awesome for social media icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .youcode-logo {
            font-family: 'Arial', sans-serif;
            font-weight: bold;
            font-size: 1.5rem;
        }
        .youcode-logo .you {
            color: #000;
        }
        .youcode-logo .code {
            color: #2563eb;
        }
        /* Ensure sidebar and content layout */
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .container {
            display: flex;
            flex: 1;
        }
        .sidebar {
            width: 100%;
            height: auto;
            flex-shrink: 0;
        }
        .main-content {
            flex: 1;
            overflow-x: auto;
        }
        @media (min-width: 768px) {
            .sidebar {
                width: 16rem; /* Matches the screenshot width */
                height: 100vh;
                position: sticky;
                top: 0;
            }
            .main-content {
                margin-left: 0;
            }
        }
        /* Ensure stats cards stack properly */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
        }
        /* Footer stays at bottom */
        footer {
            margin-top: auto;
        }
    </style>
</head>

<body class="bg-gray-100">
    <!-- Main Container -->
    <div class="container">
        <!-- Sidebar -->
        <div class="bg-white shadow-lg sidebar">
            <div class="flex-shrink-0">
                <h1 class="youcode-logo">
                    <span class="you">You</span><span class="code">Code</span>
                </h1>
            </div>
            <nav class="mt-4">
                <a href="admin.dashboard" class="flex items-center px-4 py-2 bg-purple-500 text-white">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    DASHBOARD
                </a>
                <a href="{{ route('admin.candidate') }}" class="flex items-center px-4 py-2 bg-white-500 text-black">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Candidate
                </a>
                <a href="#" class="flex items-center px-4 py-2 bg-white-500 text-black">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    staff
                </a>
                <a href="{{ route('admin.quizzes.index') }}" class="flex items-center px-4 py-2 bg-white-500 text-black">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Quizzes
                </a>
                <a href="#" class="flex items-center px-4 py-2 bg-white-500 text-black">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    staff Events
                </a>
            </nav>
            <div class="p-4">
                <button class="bg-purple-500 text-white px-4 py-2 rounded-lg flex items-center w-full">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    CREATE ACCOUNT
                </button>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content p-6">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row justify-between items-center mb-6">
                <h2 class="text-2xl font-bold mb-4 sm:mb-0">DASHBOARD</h2>
            </div>

            <!-- Stats Cards -->
            <div class="stats-grid mb-6">
                <div class="bg-white p-4 rounded-lg shadow">
                    <div class="flex items-center">
                        <div class="bg-orange-100 p-2 rounded-full mr-2">
                            <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-500">Total Users</p>
                            <p class="text-2xl font-bold">{{ $totalUsers }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <div class="flex items-center">
                        <div class="bg-green-100 p-2 rounded-full mr-2">
                            <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3v5h6v-5c0-1.657-1.343-3-3-3z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-500">Total Roles</p>
                            <p class="text-2xl font-bold">{{ $totalRoles }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <div class="flex items-center">
                        <div class="bg-blue-100 p-2 rounded-full mr-2">
                            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18v18H3V3z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-500">New Users This Month</p>
                            <p class="text-2xl font-bold">{{ $newUsersThisMonth }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <div class="flex items-center">
                        <div class="bg-cyan-100 p-2 rounded-full mr-2">
                            <svg class="w-6 h-6 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2a2 2 0 01-2-2v-6a2 2 0 012-2zM3 8h2a2 2 0 012 2v6a2 2 0 01-2 2H3a2 2 0 01-2-2v-6a2 2 0 012-2zm6-2h6"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-500">Pending Approvals</p>
                            <p class="text-2xl font-bold">{{ $totalQuizzes }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="bg-white rounded-lg shadow overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">role</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">created at</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($users as $user)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">{{ $user->name }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->role->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->created_at->format('m/d/Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="bg-white rounded-lg shadow overflow-x-auto mt-6">
                <table class="min-w-full">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">title</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">description</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">time_limit</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">created at</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($quizzes as $quiz)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">{{ $quiz->title }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $quiz->description }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $quiz->time_limit }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $quiz->created_at->format('m/d/Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 w-full">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-white">
                    <h3 class="text-lg font-semibold mb-4">Contact</h3>
                    <p class="text-gray-300">Email: contact@youcode.ma</p>
                    <p class="text-gray-300">Tél: +212 5XX XX XX XX</p>
                    <p class="text-gray-300">Youssoufia, Maroc</p>
                </div>
                <div class="text-white">
                    <h3 class="text-lg font-semibold mb-4">Liens utiles</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white">À propos</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Formations</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Partenaires</a></li>
                    </ul>
                </div>
                <div class="text-white">
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
            <div class="mt-8 border-t border-gray-700 pt-8">
                <p class="text-center text-gray-300">
                    © 2025 YouCode - Une initiative de la Fondation OCP
                </p>
            </div>
        </div>
    </footer>
</body>
</html>