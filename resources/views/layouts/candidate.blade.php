<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouCode - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .youcode-logo .you { color: #000; }
        .youcode-logo .code { color: #2563eb; }
    </style>
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <h1 class="youcode-logo text-2xl font-bold">
                        <span class="you">You</span><span class="code">Code</span>
                    </h1>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700">{{ auth()->user()->name }}</span>
                    <a href="{{ route('logout') }}" 
                       class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-1">
        @yield('content')
    </main>

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