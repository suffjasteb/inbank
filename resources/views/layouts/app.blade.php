<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'INBANK') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600,700&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-gray-900 font-sans">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white dark:bg-white shadow-md hidden md:block">
            <div class="p-6 text-xl font-bold text-indigo-600 dark:text-black">
                INBANK
            </div>
            <nav class="px-6 space-y-3">
                <a href="{{ route('dashboard') }}" class="block py-2 px-3 rounded hover:bg-indigo-100 dark:hover:bg-indigo-700">🏠 Dashboard</a>
                <a href="{{ route('topup') }}" class="block py-2 px-3 rounded hover:bg-indigo-100 dark:hover:bg-indigo-700">💰 Top Up</a>
                <a href="{{ route('transfer') }}" class="block py-2 px-3 rounded hover:bg-indigo-100 dark:hover:bg-indigo-700">📤 Transfer</a>
                <a href="{{ route('withdraw') }}" class="block py-2 px-3 rounded hover:bg-indigo-100 dark:hover:bg-indigo-700">📥 Withdraw</a>
                <a href="{{ route('history') }}" class="block py-2 px-3 rounded hover:bg-indigo-100 dark:hover:bg-indigo-700">📃 History</a>
                <a href="{{ route('profile.edit') }}" class="block py-2 px-3 rounded hover:bg-indigo-100 dark:hover:bg-indigo-700">👤 Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full text-left py-2 px-3 text-red-500 hover:text-red-700 dark:hover:text-red-400">
                        🚪 Logout
                    </button>
                </form>
            </nav>
        </aside>

        <!-- Content -->
        <div class="flex-1 flex flex-col">
            <!-- Topbar -->
            <header class="bg-white shadow px-6 py-4 flex justify-between items-center">
                <div class="text-lg font-semibold">
                    @yield('title', 'Dashboard')
                </div>
                <div>
                    <span class="text-sm">{{ Auth::user()->name ?? 'Guest' }}</span>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-6">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>
