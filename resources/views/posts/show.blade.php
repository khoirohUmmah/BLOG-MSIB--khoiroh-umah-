@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md dark:bg-gray-800 mt-8">
    <h1 class="text-3xl font-semibold text-gray-800 dark:text-gray-100 mb-4">{{ $post->title }}</h1>
    
    @if ($post->image)
        <div class="mb-4">
            <img src="{{ asset('storage/' . $post->image) }}" alt="Post image" class="img-thumbnail rounded-md" style="width: 100%; max-width: 600px;">
        </div>
    @else
        <p class="text-red-500">Gambar tidak tersedia.</p>
    @endif

    <p class="text-gray-700 dark:text-gray-300 mb-4">{{ $post->content }}</p>
    
    <p class="text-gray-600 dark:text-gray-400"><strong>Category:</strong> {{ $post->category->name }}</p>
    <p class="text-gray-600 dark:text-gray-400"><strong>Status:</strong>
        <span class="badge {{ $post->is_published ? 'bg-success' : 'bg-secondary' }}">
            {{ $post->is_published ? 'Published' : 'Draft' }}
        </span>
    </p>
    
    <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary mt-4">Back to Posts</a>
</div>
@endsection
