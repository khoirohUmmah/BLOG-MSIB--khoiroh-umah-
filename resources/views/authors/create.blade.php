@extends('layouts.app')

@section('title', 'Create Author')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md dark:bg-gray-800 mt-8">
    <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-4">Add Author</h1>
    
    <a href="{{ route('authors.index') }}" class="inline-block mb-4 text-sm text-blue-500 hover:text-blue-700">
        ← Back to Authors
    </a>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('authors.store') }}" method="POST" class="space-y-6">
        @csrf
        <div class="space-y-2">
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
            <input type="text" name="name" id="name" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600" placeholder="Enter author name" required>
        </div>

        <div class="space-y-2">
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
            <input type="email" name="email" id="email" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600" placeholder="Enter author email" required>
        </div>

        <div class="space-y-2">
            <label for="bio" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bio</label>
            <textarea name="bio" id="bio" rows="4" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600" placeholder="Enter author bio (optional)"></textarea>
        </div>

        <button type="submit" class="w-full py-2 bg-blue-500 hover:bg-blue-700 text-white font-semibold rounded-lg transition duration-300">
            Submit
        </button>
    </form>
</div>
@endsection
