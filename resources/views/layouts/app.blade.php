<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Mini Blog' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-dark text-white flex flex-col min-h-screen">

    <!-- Navbar -->
    <nav class="bg-black/80 backdrop-blur-md sticky top-0 z-50 flex items-center justify-between px-6 py-3 border-b border-primary">
        <a href="/dashboard" class="text-primary text-2xl font-bold">Mini<span class="text-white">Blog</span></a>
        <div class="flex items-center gap-4">
            @auth
                <a href="/blogs" class="hover:text-primary">Blogs</a>
                <a href="/blogs/create" class="hover:text-primary">New Post</a>
                <a href="/logout" class="hover:text-primary">Logout</a>
            @else
                <a href="/login" class="hover:text-primary">Login</a>
                <a href="/register" class="hover:text-primary">Register</a>
            @endauth
        </div>
    </nav>

    <main class="flex-grow container mx-auto px-4 py-8">
        @yield('content')
    </main>

    <footer class="text-center py-4 border-t border-primary text-gray-400">
        &copy; {{ date('Y') }} Bloggie — Crafted with ❤️
    </footer>

</body>
</html>