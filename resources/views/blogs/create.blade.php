@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-black/60 border border-primary rounded-2xl p-6">
    <h2 class="text-2xl font-bold mb-4 text-primary text-center">New Blog Post</h2>

    <form method="POST" action="{{ route('blogs.store') }}" class="space-y-4">
        @csrf
        <input type="text" name="title" placeholder="Post Title"
            class="w-full bg-dark border border-gray-700 rounded-lg px-4 py-2 focus:border-primary focus:ring-1 focus:ring-primary outline-none">

        <textarea name="body" rows="6" placeholder="Write your post here..."
            class="w-full bg-dark border border-gray-700 rounded-lg px-4 py-2 focus:border-primary focus:ring-1 focus:ring-primary outline-none"></textarea>

        <button type="submit" class="w-full bg-primary hover:bg-red-700 py-2 rounded-lg font-semibold">
            Publish
        </button>
    </form>
</div>
@endsection