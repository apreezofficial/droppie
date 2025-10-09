@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-black/60 rounded-2xl p-6 border border-primary shadow-lg">
    <h2 class="text-2xl font-bold mb-4 text-center text-primary">Register</h2>

    <form method="POST" action="/register" class="space-y-4">
        @csrf
        <input type="text" name="name" placeholder="Full Name"
            class="w-full bg-dark border border-gray-700 rounded-lg px-4 py-2 focus:border-primary focus:ring-1 focus:ring-primary outline-none">

        <input type="email" name="email" placeholder="Email"
            class="w-full bg-dark border border-gray-700 rounded-lg px-4 py-2 focus:border-primary focus:ring-1 focus:ring-primary outline-none">

        <input type="password" name="password" placeholder="Password"
            class="w-full bg-dark border border-gray-700 rounded-lg px-4 py-2 focus:border-primary focus:ring-1 focus:ring-primary outline-none">

        <input type="password" name="password_confirmation" placeholder="Confirm Password"
            class="w-full bg-dark border border-gray-700 rounded-lg px-4 py-2 focus:border-primary focus:ring-1 focus:ring-primary outline-none">

        <button type="submit" class="w-full bg-primary hover:bg-red-700 py-2 rounded-lg font-semibold">
            Register
        </button>

        <p class="text-center text-sm text-gray-400 mt-3">
            Already have an account?
            <a href="/login" class="text-primary hover:underline">Login</a>
        </p>
    </form>
</div>
@endsection