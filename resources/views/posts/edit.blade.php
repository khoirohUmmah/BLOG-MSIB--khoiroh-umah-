@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md dark:bg-gray-800 mt-8">
    <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-4">Edit Post</h1>
    <a href="{{ route('posts.index') }}" class="mb-4 inline-block bg-gray-400 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded">
        Back
    </a>
    
    @if ($errors->any())
        <div class="alert alert-danger mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
            <input type="text" name="title" id="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('title', $post->title) }}">
        </div>
        
        <div class="form-group mb-4">
            <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Content</label>
            <textarea name="content" id="content" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('content', $post->content) }}</textarea>
        </div>

        <div class="form-group mb-4">
            <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category</label>
            <select name="category_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Upload Image</label>
            <input type="file" name="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>

        <div class="form-check mb-4">
            <input type="hidden" name="is_published" value="0">
            <input type="checkbox" name="is_published" class="form-check-input" id="isPublished" value="1" {{ old('is_published', $post->is_published) ? 'checked' : '' }}>
            <label for="isPublished" class="form-check-label">Publish</label>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Update</button>
    </form>
</div>
@endsection
