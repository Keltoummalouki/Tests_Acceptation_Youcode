@extends('layouts.layout')

@section('title', 'Create Staff Member')

@section('content')
<div class="py-12 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-sm p-6">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-8">Create Staff Member</h1>

            <form action="{{ route('staff.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" 
                           name="name" 
                           id="name" 
                           value="{{ old('name') }}"
                           class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('name') border-red-300 @enderror"
                           required>
                    @error('name')
                        <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" 
                           name="email" 
                           id="email" 
                           value="{{ old('email') }}"
                           class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('email') border-red-300 @enderror"
                           required>
                    @error('email')
                        <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" 
                           name="password" 
                           id="password" 
                           class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('password') border-red-300 @enderror"
                           required>
                    @error('password')
                        <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input type="password" 
                           name="password_confirmation" 
                           id="password_confirmation" 
                           class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                           required>
                </div>

                <div class="flex justify-end">
                    <button type="submit" 
                            class="inline-flex justify-center items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Create Staff Member
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection