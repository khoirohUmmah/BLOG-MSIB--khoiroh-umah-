@extends('layouts.app')

@section('title', $category->name)

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md dark:bg-gray-800 mt-8">
    <h1 class="text-3xl font-semibold text-gray-800 dark:text-gray-100 mb-4">{{ $category->name }}</h1>
    
    @if ($category->description)
        <p class="text-gray-700 dark:text-gray-300 mb-4">{{ $category->description }}</p>
    @else
        <p class="text-gray-700 dark:text-gray-300 mb-4">Deskripsi tidak tersedia.</p>
    @endif

    <!-- Jika ada post yang terkait dengan kategori ini, tampilkan -->
    @if($category->posts->count() > 0)
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mt-6">Posts in this Category:</h2>
        <ul class="list-disc pl-5">
            @foreach ($category->posts as $post)
                <li>
                    <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500 hover:underline">{{ $post->title }}</a>
                    <span class="text-gray-600"> ({{ $post->is_published ? 'Published' : 'Draft' }})</span>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-gray-600 dark:text-gray-400 mt-4">Tidak ada post di kategori ini.</p>
    @endif

    <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary mt-4">Back to Categories</a>
</div>
@endsection
