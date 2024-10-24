@extends('layouts.app')

@section('title', 'Authors')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md dark:bg-gray-800 mt-8">
    <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-4">Authors</h1>

    <a href="{{ route('authors.create') }}" class="mb-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
        Add Author
    </a>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="py-3 px-4 border-b">Name</th>
                    <th class="py-3 px-4 border-b">Email</th>
                    <th class="py-3 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (count($authors) > 0)
                    @foreach ($authors as $author)
                        <tr class="hover:bg-gray-100">
                            <td class="py-2 px-4 border-b">{{ $author->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $author->email }}</td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('authors.destroy', $author->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this author?');">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3" class="py-2 px-4 border-b text-center">No authors available.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
