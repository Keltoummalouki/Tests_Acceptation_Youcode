<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouCode - École de Programmation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <!-- Logo -->
                    <div class="flex-shrink-0">
                        <h1 class="youcode-logo">
                            <span class="you">You</span><span class="code">Code</span>
                        </h1>
                    </div>
                </div>
                <!-- Navigation Links -->
                <div class="hidden sm:ml-6 sm:flex sm:items-center space-x-8">
                    <a href="#" class="text-gray-700 hover:text-blue-600 px-3 py-2 font-medium">Accueil</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600 px-3 py-2 font-medium">Formations</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600 px-3 py-2 font-medium">À propos</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600 px-3 py-2 font-medium">Contact</a>
                    <a href="/register" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Inscrivez-vous</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                    <div class="sm:text-center lg:text-left">
                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                            <span class="block">Formez-vous aux</span>
                            <span class="block text-blue-600">métiers du numérique</span>
                        </h1>
                        <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            Formation gratuite en développement web et mobile au Maroc. Une initiative de la Fondation OCP pour former les talents de demain.
                        </p>
                        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                            <div class="rounded-md shadow">
                                <a href="/register" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 md:py-4 md:text-lg md:px-10">
                                    Découvrir l'école
                                </a>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <!-- Formations -->
    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900">
                    Nos Formations
                </h2>
                <p class="mt-4 text-lg text-gray-500">
                    Des formations pratiques adaptées aux besoins du marché
                </p>
            </div>

            <div class="mt-10">
                <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-4">
                    <!-- Formation 1 -->
                    <div class="relative bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <div class="text-center">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white mx-auto">
                                <i class="fas fa-laptop-code"></i>
                            </div>
                            <h3 class="mt-4 text-lg font-medium text-gray-900">Développement Web Full-Stack</h3>
                            <p class="mt-2 text-sm text-gray-500">
                                HTML, CSS, JavaScript, PHP, Python
                            </p>
                        </div>
                    </div>

                    <!-- Formation 2 -->
                    <div class="relative bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <div class="text-center">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white mx-auto">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <h3 class="mt-4 text-lg font-medium text-gray-900">Développement Mobile</h3>
                            <p class="mt-2 text-sm text-gray-500">
                                React Native, Flutter
                            </p>
                        </div>
                    </div>

                    <!-- Formation 3 -->
                    <div class="relative bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <div class="text-center">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white mx-auto">
                                <i class="fas fa-paint-brush"></i>
                            </div>
                            <h3 class="mt-4 text-lg font-medium text-gray-900">UX/UI Design</h3>
                            <p class="mt-2 text-sm text-gray-500">
                                Design d'interfaces et expérience utilisateur
                            </p>
                        </div>
                    </div>

                    <!-- Formation 4 -->
                    <div class="relative bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <div class="text-center">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white mx-auto">
                                <i class="fas fa-brain"></i>
                            </div>
                            <h3 class="mt-4 text-lg font-medium text-gray-900">Intelligence Artificielle</h3>
                            <p class="mt-2 text-sm text-gray-500">
                                Machine Learning et Data Science
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Approche Pédagogique -->
    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900">
                    Notre Approche Pédagogique
                </h2>
                <p class="mt-4 text-lg text-gray-500">
                    Une méthode innovante basée sur la pratique
                </p>
            </div>

            <div class="mt-10">
                <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-3">
                    <div class="relative bg-white p-6 rounded-lg shadow-sm">
                        <div class="text-center">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white mx-auto">
                                <i class="fas fa-project-diagram"></i>
                            </div>
                            <h3 class="mt-4 text-lg font-medium text-gray-900">Apprentissage par projets</h3>
                            <p class="mt-2 text-sm text-gray-500">
                                Travaillez sur des projets concrets du monde professionnel
                            </p>
                        </div>
                    </div>

                    <div class="relative bg-white p-6 rounded-lg shadow-sm">
                        <div class="text-center">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white mx-auto">
                                <i class="fas fa-users"></i>
                            </div>
                            <h3 class="mt-4 text-lg font-medium text-gray-900">Accompagnement personnalisé</h3>
                            <p class="mt-2 text-sm text-gray-500">
                                Suivi individuel par des coachs expérimentés
                            </p>
                        </div>
                    </div>

                    <div class="relative bg-white p-6 rounded-lg shadow-sm">
                        <div class="text-center">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white mx-auto">
                                <i class="fas fa-handshake"></i>
                            </div>
                            <h3 class="mt-4 text-lg font-medium text-gray-900">Soft Skills</h3>
                            <p class="mt-2 text-sm text-gray-500">
                                Développement des compétences humaines et professionnelles
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800">
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