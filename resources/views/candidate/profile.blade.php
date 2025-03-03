@extends('layouts.candidate')

@section('title', 'Complete Your Profile')

@section('content')
<div class="py-12 bg-gray-50 min-h-screen">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-sm p-6">
            <!-- Header -->
            <div class="mb-8 text-center">
                <h1 class="text-3xl font-extrabold text-gray-900">Complete Your Profile</h1>
                <p class="mt-2 text-lg text-gray-500">Please provide your personal information to continue</p>
            </div>

            <!-- Profile Form -->
            <form action="{{ route('candidate.profile.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Phone -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="tel" 
                           name="phone" 
                           id="phone" 
                           value="{{ old('phone') }}"
                           class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('phone') border-red-300 @enderror"
                           placeholder="+212 6XX XXX XXX"
                           required>
                    @error('phone')
                        <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Address -->
                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" 
                           name="address" 
                           id="address" 
                           value="{{ old('address') }}"
                           class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('address') border-red-300 @enderror"
                           placeholder="Your full address"
                           required>
                    @error('address')
                        <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- City -->
                <div>
                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                    <input type="text" 
                           name="city" 
                           id="city" 
                           value="{{ old('city') }}"
                           class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('city') border-red-300 @enderror"
                           placeholder="Your city"
                           required>
                    @error('city')
                        <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Date of Birth -->
                <div>
                    <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                    <input type="date" 
                           name="date_of_birth" 
                           id="date_of_birth" 
                           value="{{ old('date_of_birth') }}"
                           class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('date_of_birth') border-red-300 @enderror"
                           required>
                    @error('date_of_birth')
                        <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Document Type -->
                <div>
                    <label for="document_type" class="block text-sm font-medium text-gray-700">Document Type</label>
                    <select name="document_type" 
                            id="document_type" 
                            class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('document_type') border-red-300 @enderror"
                            required>
                        <option value="">Select document type</option>
                        <option value="cin" {{ old('document_type') === 'cin' ? 'selected' : '' }}>CIN</option>
                        <option value="passport" {{ old('document_type') === 'passport' ? 'selected' : '' }}>Passport</option>
                    </select>
                    @error('document_type')
                        <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Document Upload -->
                <div>
                    <label for="document_path" class="block text-sm font-medium text-gray-700">Upload Document</label>
                    <input type="file" 
                           name="document_path" 
                           id="document_path" 
                           class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 focus:outline-none @error('document_path') border-red-300 @enderror"
                           accept=".pdf,.jpg,.png"
                           required>
                    @error('document_path')
                        <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row justify-between gap-4 pt-4">
                    <button type="submit" 
                            class="w-full sm:w-auto inline-flex justify-center items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
                        Save Profile
                    </button>
                    <a href="{{ route('candidate.quiz.start') }}" 
                       class="w-full sm:w-auto inline-flex justify-center items-center px-6 py-3 border border-gray-300 text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
                        Start Quiz
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection