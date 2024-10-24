@extends('layouts.app')

@section('title', 'Edit Author')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md dark:bg-gray-800 mt-8">
    <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-4">Edit Author</h1>
    <a href="{{ route('authors.index') }}" class="mb-4 inline-block bg-gray-400 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded">
        Back
    </a>

    @if ($errors->any())
        <div class="alert alert-danger mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('authors.update', $author->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') ?? $author->name }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
        </div>

        <div class="form-group mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') ?? $author->email }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
        </div>

        <div class="form-group mb-4">
            <label for="bio" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bio</label>
            <textarea name="bio" id="bio" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('bio') ?? $author->bio }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-2">
            Update Author
        </button>
    </form>
</div>
@endsection
