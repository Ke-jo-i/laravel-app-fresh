@props([
    'title' => 'My Laravel App',
])
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen">
    <nav class="app-nav flex items-center justify-center gap-2 shadow-md bg-white py-2">
        <a href="/"
            class="px-3 py-2 hover:bg-gray-200 transition-colors duration-200 {{ request()->is('/') ? 'bg-gray-100 font-bold' : '' }}">Home</a>
        <a href="/about"
            class="px-3 py-2 hover:bg-gray-200 transition-colors duration-200 {{ request()->is('about') ? 'bg-gray-100 font-bold' : '' }}">About</a>
        <a href="/contact"
            class="px-3 py-2 hover:bg-gray-200 transition-colors duration-200 {{ request()->is('contact') ? 'bg-gray-100 font-bold' : '' }}">Contact</a>
        <a href="/posts"
            class="px-3 py-2 hover:bg-gray-200 transition-colors duration-200 {{ request()->is('posts*') ? 'bg-gray-100 font-bold' : '' }}">Posts</a>
        <a href="/register"
            class="px-3 py-2 hover:bg-gray-200 transition-colors duration-200 {{ request()->is('register*') ? 'bg-gray-100 font-bold' : '' }}">User
            Registration</a>

        {{-- GIDUGANG NAKO DIRI ANG BOOKS LINK --}}
        <a href="{{ route('books.index') }}"
            class="px-3 py-2 hover:bg-blue-100 text-blue-600 font-bold transition-colors duration-200 {{ request()->is('books*') ? 'bg-blue-50 border-b-2 border-blue-600' : '' }}">
            Books Management
        </a>
    </nav>

    <main class="min-h-[calc(100vh-60px)]">
        {{ $slot }}
    </main>
</body>

</html>