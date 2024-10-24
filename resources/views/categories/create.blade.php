@extends('layouts.app')

@section('title', 'Create Category')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md dark:bg-gray-800 mt-8">
    <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-4">Create a New Category</h1>
    
    <a href="{{ route('categories.index') }}" class="inline-block mb-4 text-sm text-blue-500 hover:text-blue-700">
        ← Back to Categories
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

    <form action="{{ route('categories.store') }}" method="POST" class="space-y-6">
        @csrf
        <div class="space-y-2">
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category Name</label>
            <input type="text" name="name" id="name" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600" placeholder="Enter category name" required>
        </div>
        
        <div class="space-y-2">
            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
            <textarea name="description" id="description" rows="4" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600" placeholder="Enter description (optional)"></textarea>
        </div>

        <button type="submit" class="w-full py-2 bg-blue-500 hover:bg-blue-700 text-white font-semibold rounded-lg transition duration-300">
            Submit
        </button>
    </form>
</div>
@endsection
