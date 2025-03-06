@extends('layouts.layout')

@section('title', 'Register')

@section('content')
<div class="py-12 bg-gray-50 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-sm p-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-extrabold text-gray-900">Register</h1>
                <p class="mt-2 text-lg text-gray-500">Create your YouCode account</p>
            </div>

            <!-- Registration Form -->
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input id="name" 
                           type="text" 
                           name="name" 
                           value="{{ old('name') }}" 
                           required 
                           autofocus 
                           class="mt-1 block w-full rounded-md border border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 focus:outline-none @error('name') border-red-300 @enderror"
                           placeholder="John Doe">
                    @error('name')
                        <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input id="email" 
                           type="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           required 
                           class="mt-1 block w-full rounded-md border border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 focus:outline-none @error('email') border-red-300 @enderror"
                           placeholder="you@example.com">
                    @error('email')
                        <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" 
                           type="password" 
                           name="password" 
                           required 
                           class="mt-1 block w-full rounded-md border border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 focus:outline-none @error('password') border-red-300 @enderror"
                           placeholder="••••••••">
                    @error('password')
                        <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input id="password_confirmation" 
                           type="password" 
                           name="password_confirmation" 
                           required 
                           class="mt-1 block w-full rounded-md border border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 focus:outline-none">
                </div>

                <!-- Submit Button -->
                <div class="pt-2">
                    <button type="submit" 
                            class="w-full inline-flex justify-center items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
                        Register
                    </button>
                </div>

                <!-- Login Link -->
                <div class="text-center">
                    <p class="text-sm text-gray-600">
                        Already have an account? 
                        <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Sign in</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection