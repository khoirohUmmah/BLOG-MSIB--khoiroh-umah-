@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md dark:bg-gray-800 mt-8">
    <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-4">Create a New Post</h1>
    
    <a href="{{ route('posts.index') }}" class="inline-block mb-4 text-sm text-blue-500 hover:text-blue-700">
        ← Back to Posts
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

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div class="space-y-2">
            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
            <input type="text" name="title" id="title" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600" value="{{ old('title') }}" required>
        </div>

        <div class="space-y-2">
            <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Content</label>
            <textarea name="content" id="content" rows="4" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600" required>{{ old('content') }}</textarea>
        </div>

        <div class="space-y-2">
            <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category</label>
            <select name="category_id" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600" required>
                <option value="">Choose</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="space-y-2">
            <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Upload Image</label>
            <input type="file" name="image" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600">
        </div>

        <input type="hidden" name="is_published" value="0">
        <div class="form-check">
            <input type="checkbox" name="is_published" class="form-check-input" id="isPublished" value="1">
            <label for="isPublished" class="form-check-label">Publish</label>
        </div>

        <button type="submit" class="w-full py-2 bg-blue-500 hover:bg-blue-700 text-white font-semibold rounded-lg transition duration-300">
            Submit
        </button>
    </form>
</div>
@endsection
