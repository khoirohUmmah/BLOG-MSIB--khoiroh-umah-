@extends('layouts.app')

@section('title', $author->name)

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md dark:bg-gray-800 mt-8">
    <h1 class="text-3xl font-semibold text-gray-800 dark:text-gray-100 mb-4">{{ $author->name }}</h1>
    
    <p class="text-gray-700 dark:text-gray-300 mb-4"><strong>Email:</strong> {{ $author->email }}</p>
    <p class="text-gray-700 dark:text-gray-300 mb-4"><strong>Bio:</strong> {{ $author->bio }}</p>

    <a href="{{ route('authors.index') }}" class="btn btn-outline-secondary mt-4">Back to Authors</a>
</div>
@endsection
