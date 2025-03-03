<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - YouCode</title>
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
                width: 16rem;
                height: 100vh;
                position: sticky;
                top: 0;
            }
        }
        footer {
            margin-top: auto;
        }
    </style>
</head>

<body class="bg-gray-100">

        <!-- Main Content -->
        <div class="main-content p-6 flex items-center justify-center">
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
                <h2 class="text-2xl font-bold mb-6 text-center">Inscrivez-vous</h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror">
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('email') border-red-500 @enderror">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                        <input id="password" type="password" name="password" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('password') border-red-500 @enderror">
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-6">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmez le mot de passe</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            S'inscrire
                        </button>
                    </div>

                    <!-- Login Link -->
                    <p class="mt-4 text-center text-sm text-gray-600">
                        Vous avez déjà un compte ? <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Connexion</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>