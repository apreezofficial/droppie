@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-black/60 rounded-2xl p-6 border border-primary shadow-lg">
    <h2 class="text-2xl font-bold mb-4 text-center text-primary">Login</h2>

    <form method="POST" action="/login" class="space-y-4">
        @csrf
        <input type="email" name="email" placeholder="Email"
            class="w-full bg-dark border border-gray-700 rounded-lg px-4 py-2 focus:border-primary focus:ring-1 focus:ring-primary outline-none">

        <input type="password" name="password" placeholder="Password"
            class="w-full bg-dark border border-gray-700 rounded-lg px-4 py-2 focus:border-primary focus:ring-1 focus:ring-primary outline-none">

        <button type="submit" class="w-full bg-primary hover:bg-red-700 py-2 rounded-lg font-semibold">
            Login
        </button>

        <p class="text-center text-sm text-gray-400 mt-3">
            Don’t have an account?
            <a href="/register" class="text-primary hover:underline">Register</a>
        </p>
    </form>
</div>
@endsection