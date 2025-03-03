<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YoucodeTest Dashboard</title>
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
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 bg-white-500 text-black">
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
                <a href="{{ route('admin.staff.index') }}" class="flex items-center bg-purple-500  px-4 py-3 text-white-700 hover:bg-purple-100">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    staff
                </a>
                <a href="{{ route('admin.quizzes.index') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Quizzes
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="flex flex-col sm:flex-row justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Dashboard</h2>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <div class="bg-white p-4 rounded-lg shadow flex items-center">
                    <div class="bg-orange-100 p-2 rounded-full mr-3">
                        <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Total Users</p>
                        <p class="text-2xl font-bold">{{ $totalUsers }}</p>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow flex items-center">
                    <div class="bg-green-100 p-2 rounded-full mr-3">
                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3v5h6v-5c0-1.657-1.343-3-3-3z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Total Roles</p>
                        <p class="text-2xl font-bold">{{ $totalRoles }}</p>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow flex items-center">
                    <div class="bg-blue-100 p-2 rounded-full mr-3">
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18v18H3V3z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">New Users This Month</p>
                        <p class="text-2xl font-bold">{{ $newUsersThisMonth }}</p>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow flex items-center">
                    <div class="bg-cyan-100 p-2 rounded-full mr-3">
                        <svg class="w-6 h-6 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2a2 2 0 01-2-2v-6a2 2 0 012-2zM3 8h2a2 2 0 012 2v6a2 2 0 01-2 2H3a2 2 0 01-2-2v-6a2 2 0 012-2zm6-2h6"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Pending Approvals</p>
                        <p class="text-2xl font-bold">{{ $totalQuizzes }}</p>
                    </div>
                </div>
            </div>
            
            <d class="py-12 bg-gray-50">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h1 class="text-3xl font-extrabold text-gray-900 mb-8">Staff Members</h1>
            
                        @if(session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                                <span class="block sm:inline">{{ session('success') }}</span>
                            </div>
                        @endif
            
                        <div class="flex justify-end mb-4">
                            <a href="{{ route('admin.staff.create') }}" 
                               class="inline-flex justify-center items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Create Staff Member
                            </a>
                        </div>
            
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white">
                                <thead>
                                    <tr>
                                        <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                        <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                        <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($staffs as $staff)
                                        <tr>
                                            <td class="py-2 px-4 border-b border-gray-200">{{ $staff->name }}</td>
                                            <td class="py-2 px-4 border-b border-gray-200">{{ $staff->email }}</td>
                                                <td class="py-2 px-4 border-b border-gray-200">
                                                    <a href="{{ route('admin.staff.edit', $staff->id) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                                                    <form action="{{ route('admin.staff.destroy', $staff->id) }}" method="POST" class="inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-900 ml-2">Delete</button>
                                                    </form>
                                                </td>                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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