@extends('layouts.layout')

@section('title', 'Login')

@section('content')
<div class="py-12 bg-gray-50 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-sm p-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-extrabold text-gray-900">Login</h1>
                <p class="mt-2 text-lg text-gray-500">Sign in to your account</p>
            </div>

            <!-- Login Form -->
            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" 
                           name="email" 
                           id="email" 
                           value="{{ old('email') }}"
                           class="mt-1 block w-full rounded-md border border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 focus:outline-none @error('email') border-red-300 @enderror"
                           placeholder="you@example.com"
                           required>
                    @error('email')
                        <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" 
                           name="password" 
                           id="password" 
                           class="mt-1 block w-full rounded-md border border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 focus:outline-none @error('password') border-red-300 @enderror"
                           placeholder="••••••••"
                           required>
                    @error('password')
                        <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end pt-2">
                    <button type="submit" 
                            class="w-full sm:w-auto inline-flex justify-center items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
                        Sign In
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection