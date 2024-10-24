@extends('layouts.app')

@section('title', 'Categories')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md dark:bg-gray-800 mt-8">
    <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-4">Categories</h1>

    <a href="{{ route('categories.create') }}" class="mb-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
        Create New Category
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

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full bg-white border border-gray-300 rounded-lg mt-4">
        <thead>
            <tr class="bg-gray-200 text-gray-700">
                <th class="py-3 px-4 border-b">#</th>
                <th class="py-3 px-4 border-b">Name</th>
                <th class="py-3 px-4 border-b">Description</th>
                <th class="py-3 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $index => $category)
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border-b">{{ $index + 1 }}</td>
                    <td class="py-2 px-4 border-b">{{ $category->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $category->description }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('categories.edit', $category) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 ml-2">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
