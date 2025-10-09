@extends('layouts.app')

@section('content')
<h2 class="text-3xl font-bold mb-6 text-primary">All Blogs</h2>

@if($blogs->count())
<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($blogs as $blog)
        <div class="bg-black/50 border border-gray-700 rounded-xl p-5 hover:border-primary transition">
            <h3 class="text-xl font-semibold mb-2 text-white">{{ $blog->title }}</h3>
            <p class="text-gray-400 mb-3 line-clamp-3">{{ Str::limit($blog->body, 100) }}</p>
            <a href="{{ route('blogs.show', $blog) }}" class="text-primary hover:underline">Read More →</a>
        </div>
    @endforeach
</div>
@else
<p class="text-gray-400">No blogs yet. <a href="/blogs/create" class="text-primary underline">Create one</a>.</p>
@endif
@endsection