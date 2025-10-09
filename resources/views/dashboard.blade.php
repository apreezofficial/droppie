@extends('layouts.app')

@section('content')
<div class="text-center py-10">
    <h1 class="text-4xl font-extrabold text-primary mb-3">Welcome, {{ auth()->user()->name }}</h1>
    <p class="text-gray-300">Start creating amazing posts and share your thoughts.</p>
    <a href="/blogs/create" class="mt-6 inline-block bg-primary text-white py-2 px-5 rounded-lg hover:bg-red-700">
        Write a New Post
    </a>
</div>
@endsection