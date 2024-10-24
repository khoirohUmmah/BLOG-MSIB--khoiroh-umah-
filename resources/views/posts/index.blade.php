@extends('layouts.app')

@section('title', 'Posts')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md dark:bg-gray-800 mt-8">
    <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-4">Posts</h1>

    <a href="{{ route('posts.create') }}" class="mb-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
        Create Post
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
                    <th class="py-3 px-4 border-b">#</th>
                    <th class="py-3 px-4 border-b">Title</th>
                    <th class="py-3 px-4 border-b">Category</th>
                    <th class="py-3 px-4 border-b">Status</th>
                    <th class="py-3 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (count($posts) > 0)
                    @foreach ($posts as $index => $post)
                        <tr class="hover:bg-gray-100">
                            <td class="py-2 px-4 border-b">{{ $index + 1 }}</td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500 hover:underline">{{ $post->title }}</a>
                            </td>
                            <td class="py-2 px-4 border-b">{{ $post->category->name }}</td>
                            <td class="py-2 px-4 border-b">
                                <span class="badge {{ $post->is_published ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $post->is_published ? 'Published' : 'Draft' }}
                                </span>
                            </td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete this post?');">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="py-2 px-4 border-b text-center">No posts available.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
